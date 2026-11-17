<?php

namespace App\Models\ConventionAdmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class ConventionCenterLogin extends Authenticatable
{
    protected $table = 'convention_center_logins';
    protected $fillable = [
        'email',
        'password',
    ];
}
