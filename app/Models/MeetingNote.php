<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ActivityLogTrait;

class MeetingNote extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ActivityLogTrait;

    protected $table   = 'meeting_notes';
    protected $guarded = [];



    //start relations
    public function meeting()
    {
        return $this->belongsTo(Meeting::class,'meeting_id');
	}



	public function creator()
    {
        return $this->belongsTo(Employee::class,'created_by');
    }



    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }
}
