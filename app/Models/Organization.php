<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ActivityLogTrait;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ActivityLogTrait;

	protected $table = 'organizations';
    protected $guarded = [];

}
