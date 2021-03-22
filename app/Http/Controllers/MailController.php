<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;

class MailController extends Controller
{
    public function index(Request $request)
    {   
        return view('mail.mails', ['mails' => $request->user()->mails]);
    }

    public function create(Request $request)
    {   
        return view('mail.create');
    }

    public function store(Request $request)
    {   

        $request->validate([
            'to' => 'required|string|email|max:255',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
            
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $mail = Mail::create($data);

        return redirect()->route('mails');
    }
}
