<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ActivityLogTrait;

class LeadHistory extends Model
{
    use HasFactory;
    use ActivityLogTrait;

    protected $table   = 'lead_histories';
    // protected $guarded = [];
    protected $fillable = [
        'contact_id',
        'action',
        'related_model_id',
        'placeholders',
        'created_by',
    ];



    //start relations
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }



    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }



    public function getPlaceholdersArrayAttribute()
    {
        return json_decode($this->placeholders,true);
    }
}
