<?php

namespace App\Models\ConventionAdmin;

use Illuminate\Database\Eloquent\Model;

class ConventionHall extends Model
{
    protected $table = 'convention_halls';

    protected $guarded = [];

    public function conventionLogin()
    {
        return $this->belongsTo(ConventionCenterLogin::class, 'convention_center_login_id');
    }

    public function facilities()
    {
        return $this->hasMany(ConventionFacility::class, 'hall_id');
    }

    public function charges()
    {
        return $this->hasOne(ConventionHallCharge::class, 'convention_hall_id');
    }

    public function media()
    {
        return $this->hasMany(ConventionHallMedia::class, 'convention_hall_id');
    }
}