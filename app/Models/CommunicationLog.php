<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ActivityLogTrait;

class CommunicationLog extends Model
{
    use HasFactory;
    use ActivityLogTrait;
    
    protected $fillable = [
        'ticket_id',
        'user_id',
        'user_type',
        'comment',
    ];


    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
