<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'id',
        'email',
        'password',
        'name',
        'last_login_at',
        'last_login_ip',
        'status'
    ];
}
