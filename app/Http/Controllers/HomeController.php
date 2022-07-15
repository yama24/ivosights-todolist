<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, ToDoList};

class HomeController extends Controller
{
    public function index()
    {
        $todolist = ToDoList::all();
        $user = User::all();
        dd($todolist[0]);
    }
}
