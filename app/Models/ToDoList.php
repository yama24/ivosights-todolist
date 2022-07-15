<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ToDoList extends Model
{
    protected $collection = 'todolists';
}
