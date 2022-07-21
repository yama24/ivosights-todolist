<?php

namespace App\Http\Controllers;

use App\Mail\MyNotifMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function index($arr)
    {
        $details = [
            'title' => $arr['title'],
            'body' => $arr['message']
        ];

        Mail::to($arr['to'])->send(new \App\Mail\MyNotifMail($details));

        $response = [
            'success' => true,
            'message' => "Email sent successfully"
        ];
        return response()->json($response);
    }
}
