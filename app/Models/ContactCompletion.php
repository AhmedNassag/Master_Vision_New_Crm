<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCompletion extends Model
{
    use HasFactory;

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
