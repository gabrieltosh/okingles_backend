<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'lastname',
        'email', 
        'occupation',
        'ci',
        'email_verified_at',
        'status',
        'birthdate',
        'due_date',
        'phone',
        'type',
        'invoice',
        'address',
        'registter',
        'image',
        'branch_office_id',
        'profile_id',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function branch_office(){
        return $this->belongsTo(BranchOffice::class,'branch_office_id');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }
}
