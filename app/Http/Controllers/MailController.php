<?php

namespace App\Http\Controllers;

use App\Mail\MyNotifMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function index(Request $request)
    {

        $details = [
            'title' => $request->title,
            'body' => $request->message
        ];

        Mail::to($request->to)->send(new \App\Mail\MyNotifMail($details));

        $response = [
            'success' => true,
            'message' => "Email sent successfully"
        ];
        return response()->json($response);
    }
}
