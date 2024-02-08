<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'attachments';
    protected $guarded = [];



    //start relations
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
