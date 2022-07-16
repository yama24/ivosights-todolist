<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $collection = 'users';
    protected $guarded = ['id'];
}
