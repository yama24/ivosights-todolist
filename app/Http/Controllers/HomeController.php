<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, ToDoList};

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getData(Request $request)
    {
        $email = $request->input('email');
        if ($email) {
            $user = User::where('email', '=', $email)->first();
            $todolist = ToDoList::where('user', '=', $user->email)->orderBy('created_at', 'ASC')->get();
        } else {
            $todolist = ToDoList::orderBy('created_at', 'ASC')->get();
        }
        $data = [
            "count" => count($todolist),
            "data" => $todolist,
        ];
        return response()->json(
            $data,
            202,
            [
                'Content-Type' => 'application/json',
                'Charset' => 'utf-8'
            ],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}
