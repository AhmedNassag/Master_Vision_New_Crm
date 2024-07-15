<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Meeting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'meetings';
    protected $guarded = [];
    protected $casts = [
        'interests_ids' => 'array',
    ];



    //start relations
    public function notes()
    {
        return $this->hasMany(MeetingNote::class,'meeting_id');
	}



	public function creator()
    {
        return $this->belongsTo(Employee::class,'created_by');
    }



    public function contact()
    {
        return $this->belongsTo(Contact::class,'contact_id');
    }


    public function interests()
    {
        return $this->belongsToMany(SubActivity::class,'interest_meeting','meeting_id','interest_id');
    }



    public function reply()
    {
        return $this->belongsTo(SavedReply::class, 'reply_id');
    }



    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }
}
