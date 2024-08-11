<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use App\Services\PointsCalculationService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $table   = 'customers';
    protected $guarded = [];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            if
            (
                $model->invoices()->count() > 0       ||
                $model->points()->count() > 0         ||
                $model->pointHistories()->count() > 0 ||
                $model->reorderReminder() > 0         ||
                $model->reminders()->count() > 0      ||
                $model->contacts()->count() > 0       ||
                $model->customers()->count() > 0      ||
                $model->tickets()->count() > 0        ||
                $model->related_customers()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });

        /*static::addGlobalScope('branch', function (Builder $builder)
        {
            if (auth()->user())
            {
                if (auth()->user()->type == "Employee")
                {
                    $builder->where(function ($query) {
                        $query->where('branch_id', auth()->user()->employee->branch_id)->orWhere('created_by', auth()->user()->context_id);
                    });
                }
            }
        });*/
    }



    //start jwt
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    //end jwt



    //start relations
    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }


    public function customerCategory()
    {
        return $this->belongsTo(ContactCategory::class, 'contact_category_id');
    }



    public function customerSource()
    {
        return $this->belongsTo(ContactSource::class, 'contact_source_id');
    }



    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }



    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }



    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }



    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }



    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }



    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }



    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }



    public function parent()
    {
		return $this->belongsTo(Customer::class,'parent_id');
    }



    public function createdBy()
    {
		return $this->belongsTo(Employee::class,'created_by');
    }



	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'customer_id');
	}



    public function reminders()
	{
		return $this->hasMany(ReorderReminder::class, 'customer_id');
	}



    public function tickets()
	{
		return $this->hasMany(Ticket::class, 'customer_id');
	}



    public function attachments()
    {
		return $this->hasMany(Attachment::class, 'customer_id');

    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'customer_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'parent_id');
    }



    public function related_customers()
    {
		return $this->hasMany(Customer::class,'parent_id');
    }



    public function points()
    {
        return $this->hasMany(Point::class, 'customer_id');
    }



    public function pointHistories()
    {
        return $this->hasMany(PointHistory::class, 'customer_id');
    }



    public function reorderReminder()
    {
        return $this->hasMany(ReorderReminder::class, 'customer_id');
    }



    public function calculateSumOfPoints()
    {
        return $this->points()->where('expiry_date','>=',Carbon::today()->format('Y-m-d'))->sum('points');
    }



    public function calculatePointsValue()
    {
        $service = new PointsCalculationService();
        return $service->getPointsValue($this->id);
    }



    public function files()
    {
        return $this->morphMany(Media::class,'mediable');
    }



    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }



    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
