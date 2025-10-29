<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
// implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasProfilePhoto, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function getJWTIdentifier()
    {
        return $this->getKey(); // Typically the user ID
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles',  'user_id', 'role_id');
    }
    // public function admin(){
    //     return $this->hasOne(Admin::class);
    // }
    // public function superadmin(){
    //     return $this->hasOne(SuperAdmin::class);
    // }
    // public function student(){
    //     return $this->hasOne(Student::class);
    // }
    // public function teacher(){
    //     return $this->hasOne(Teacher::class);
    // }

    public function getJWTCustomClaims()
    {
        return []; // Optional additional payload
    }
}