<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Profile extends User implements MustVerifyEmail
{
    use SoftDeletes;

    protected $dates = ['created_at', 'email_verified_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image',
        'remember_token',
        'email_verified_at'
        // other attributes here
    ];
    public function getImageAttribute($value)
    {
        // return 'balalallla';
        return $value ?? 'profile/profile.jpg';
    }
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
