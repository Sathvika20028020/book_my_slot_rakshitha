<?php

namespace App\Models\ConventionAdmin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ConventionCenterLogin extends Authenticatable
{
    protected $table = 'convention_center_logins';

    protected $guard = 'convention';

    protected $fillable = [
        'incharge_name',
        'phone',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    public function halls()
    {
        return $this->hasMany(ConventionHall::class, 'convention_center_login_id');
    }

    public function facilities()
    {
        return $this->hasMany(ConventionFacility::class, 'convention_center_login_id');
    }

    public function bookingPolicy()
    {
        return $this->hasOne(ConventionBookingPolicy::class, 'convention_center_login_id');
    }

    public function centreDetails()
    {
        return $this->hasMany(ConventionCenterDetail::class, 'convention_user_id', 'id');
    }
}