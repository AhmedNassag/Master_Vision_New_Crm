<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SavedReply extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'saved_replies';
    protected $guarded = [];



    //start relations
    public function contacts()
    {
        return $this->hasMany(Meeting::class, 'reply_id');
    }
}
