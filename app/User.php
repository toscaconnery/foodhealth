<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'usertype', 'gender', 'phone', 'dob', 'imagepath',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
