<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Support;
use Illuminate\Support\Facades\Mail;
use Mockery\Generator\StringManipulation\Pass\Pass;

class MailController extends Controller
{
    public function index()
    {
        return view('support/index');
    }

    public function send(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Envio do email
        Mail::to('support@ZeVans.com', 'Suporte Ze Vans')->send(new Support([
            'fromName' => $request->name,
            'fromEmail' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]));

        // Redirecionamento após o envio do email
        return redirect('/')->with('success', 'Email enviado com sucesso!');
    }
}
