<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ActivityLogTrait;

class Media extends Model
{
    use HasFactory;
    use ActivityLogTrait;

    protected $table   = 'media';
    protected $guarded = [];



    //start relations
    public function mediable()
    {
        return $this->morphTo();
    }
}
