<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'campaigns';
    protected $guarded = [];



    //start relations
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }



    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }



    public function contactSource()
    {
        return $this->belongsTo(ContactSource::class, 'contact_source_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'campaign_id');
    }
}
