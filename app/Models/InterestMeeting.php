<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterestMeeting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'interest_meetings';
    protected $guarded = [];



    //start relations
    public function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meeting_id');
    }



    public function interest()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }
}
