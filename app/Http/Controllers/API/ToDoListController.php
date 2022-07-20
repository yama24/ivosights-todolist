<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function index()
    {
        $todolists = ToDoList::where('user', '=', session('email'))->where('done', '=', 0)->orderBy('created_at', 'DESC')->get();
        $checkedtodolists = ToDoList::where('user', '=', session('email'))->where('done', '=', 1)->orderBy('created_at', 'DESC')->get();
        $response = [
            'success' => true,
            'uncheck' => $todolists,
            'checked' => $checkedtodolists
        ];
        return response()->json($response);
    }

    public function add(Request $request)
    {
        if ($request->task != null && $request->expired_at != null) {
            $todo = new ToDoList();
            $todo->task = $request->task;
            $todo->user = session('email');
            $todo->done = 0;
            $todo->expired_at = date('d-m-Y H:i:s', strtotime($request->expired_at));
            $todo->save();
            $response = [
                'success' => true,
                'message' => "ToDoList created successfully"
            ];
        } else {
            $response = [
                'success' => false,
                'message' => "All field is required"
            ];
        }
        return response()->json($response);
    }
    public function del(Request $request)
    {
        $todo = ToDoList::find($request->id);
        $todo->delete();
        $response = [
            'success' => true,
            'message' => "Task deleted successfully"
        ];
        return response()->json($response);
    }
    public function edit($id)
    {
        $todo = ToDoList::find($id);
        $todo->expired_at = date('Y-m-d\TH:i:s', strtotime($todo->expired_at));
        $response = [
            'success' => true,
            'message' => $todo
        ];
        return response()->json($response);
    }

    public function update(Request $request)
    {
        $todo = ToDoList::find($request->id);
        $todo->task = $request->task;
        $todo->user = session('email');
        $todo->done = 0;
        $todo->expired_at = date('d-m-Y H:i:s', strtotime($request->expired_at));
        $todo->save();
        $response = [
            'success' => true,
            'message' => $request
        ];
        return response()->json($response);
    }

    public function check(Request $request)
    {
        $todo = ToDoList::find($request->id);
        $todo->done = ($todo->done) ? 0 : 1;
        $todo->save();
        $response = [
            'success' => true,
            'message' => "Task deleted successfully"
        ];
        return response()->json($response);
    }
}
