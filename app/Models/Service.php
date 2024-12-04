<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ActivityLogTrait;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ActivityLogTrait;

    protected $table   = 'services';
    protected $guarded = [];



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->invoices()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }



    //start relations
    public function interest()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }



    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'service_id');
    }
}
