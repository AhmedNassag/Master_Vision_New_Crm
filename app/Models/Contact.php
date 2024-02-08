<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\ContactDataObserver;
use stdClass;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'contacts';
    protected $guarded = [];


    public function getStatusInfoAttribute()
	{
		$statusClass = '';
		switch($this->status) {
			case 'new':
				$statusClass = 'badge bg-primary';
				break;
			case 'contacted':
				$statusClass = 'badge bg-success';
				break;
			case 'qualified':
				$statusClass = 'badge bg-warning';
				break;
			case 'converted':
				$statusClass = 'badge bg-info';
				break;
			default:
				$statusClass = 'badge bg-secondary';
				break;
		}
		return ['class'=> $statusClass,'status'=>trans('main.'.ucfirst($this->status))];
	}

    public function getContactCategoryAttribute()
    {
        $categoryString = new stdClass();
        $categoryString->name = "";
        foreach ($this->categories as $category) {
            $categoryString->name .= ", ".$category->name;
        }
        return $categoryString;
    }


    public function getCompletionPercentageAttribute()
    {
        $contactObserver = new ContactDataObserver();
        $totalFields = count($contactObserver->trackedFields);
        $completedFields = ContactCompletion::where('contact_id', $this->id)->count();

        if ($totalFields === 0) {
            return 0; // Avoid division by zero
        }

        $percentage = ($completedFields / $totalFields) * 100;
        return round($percentage);
    }

    public function setCustomAttributesAttribute($value)
    {
        $this->attributes['custom_attributes'] = json_encode($value);
    }

    public function getCustomAttributesAttribute($value)
    {
        return json_decode($value, true);
    }







    //start relations
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }



    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }



    public function contactSource()
    {
        return $this->belongsTo(ContactSource::class, 'contact_source_id');
    }



    public function contactCategory()
    {
        return $this->belongsTo(ContactCategory::class, 'contact_category_id');
    }



    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }



    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }



    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }



    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }



    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }



    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }



    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }



    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }



    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }



    public function contactCompletions()
    {
        return $this->hasMany(ContactCompletions::class, 'contact_id');
    }



    public function meetings()
    {
        return $this->hasMany(Meeting::class, 'contact_id');
    }



    public function leadCategories()
    {
        return $this->hasMany(LeadCategory::class, 'contact_id');
    }



    public function leadHistories()
    {
        return $this->hasMany(LeadHistory::class, 'contact_id');
    }



    public function categories()
    {
        return $this->belongsToMany(ContactCategory::class,LeadCteagory::class,'contact_id','contact_category_id');
    }



    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }
}
