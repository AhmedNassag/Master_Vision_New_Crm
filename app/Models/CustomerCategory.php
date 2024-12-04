<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ActivityLogTrait;

class CustomerCategory extends Model
{
    use HasFactory;
    use ActivityLogTrait;
}
