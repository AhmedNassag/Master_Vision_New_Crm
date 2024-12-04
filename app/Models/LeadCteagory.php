<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ActivityLogTrait;

class LeadCteagory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ActivityLogTrait;

    protected $table   = 'lead_cteagories';
    protected $guarded = [];



    //start relations
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }



    public function contactCategory()
    {
        return $this->belongsTo(ContactCategory::class, 'contact_category_id');
    }

}
