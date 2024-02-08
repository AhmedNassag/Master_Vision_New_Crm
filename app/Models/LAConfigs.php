<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LAConfigs extends Model
{
    use HasFactory;

    protected $table   = 'la_configs';
    protected $guarded = [];
}
