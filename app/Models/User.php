<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;

    use Notifiable;
    use SoftDeletes;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];



    //start relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'context_id');
    }



    public function contactCompletions()
    {
        return $this->hasMany(ContactCompletions::class, 'completed_by');
    }



    public function uploads()
    {
        return $this->hasMany(Upload::class, 'user_id');
    }



    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }
}
