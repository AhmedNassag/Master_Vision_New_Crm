<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\PointsCalculationService;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'customers';
    protected $guarded = [];



    //start relations
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'customer_id');
    }



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



	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'customer_id');
	}



    public function reminders()
	{
		return $this->hasMany(RecorderReminder::class, 'customer_id');
	}



    public function attachments()
    {
		return $this->hasMany(Attachment::class, 'customer_id');

    }



    public function parent()
    {
		return $this->belongsTo(Customer::class,'parent_id');
    }



    public function createdBy()
    {
		return $this->belongsTo(Employee::class,'created_by');
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

}
