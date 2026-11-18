<?php

namespace App\Models\ConventionAdmin;

use Illuminate\Database\Eloquent\Model;

class ConventionFacility extends Model
{
    protected $table = 'convention_facilities';

    protected $guarded = [];

    public function conventionLogin()
    {
        return $this->belongsTo(ConventionCenterLogin::class, 'convention_center_login_id');
    }

    public function hall()
    {
        return $this->belongsTo(ConventionHall::class, 'hall_id');
    }
}