<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ActivityLogTrait;

class ContactCompletion extends Model
{
    use HasFactory;
    use ActivityLogTrait;

    protected $table   = 'contact_completions';
    protected $guarded = [];



    //start relations
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }




    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }
}
