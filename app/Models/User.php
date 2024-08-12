<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Scopes\HideSpecificUserScope;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
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



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->contactCompletions()->count() > 0 ||
                $model->logs()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }

    public function scopeHidden($query) {
        return $query->where('hidden',0);
    }
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


    //start jwt
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    //end jwt



    //start relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'context_id');
    }



    public function contactCompletions()
    {
        return $this->hasMany(ContactCompletion::class, 'completed_by');
    }

    public function logs()
    {
        return $this->hasMany(CommunicationLog::class, 'user_id');
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
