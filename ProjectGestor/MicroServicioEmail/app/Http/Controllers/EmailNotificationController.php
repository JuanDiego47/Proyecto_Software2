<?php

namespace App\Http\Controllers;

use App\Mail\FraudNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailNotificationController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to($request->email)->send(new FraudNotification($request->message));

        return response()->json(['message' => 'Correo enviado correctamente']);
    }
}
