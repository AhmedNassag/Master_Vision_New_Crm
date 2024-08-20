<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ActivityLogTrait;

class Upload extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ActivityLogTrait;

    protected $table   = 'uploads';
    protected $guarded = [];



    //start relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function path()
    {
        return url("files/".$this->hash."/".$this->name);
    }
}
