<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperadminLogin extends Authenticatable
{
    protected $table = 'superadmin_logins';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
