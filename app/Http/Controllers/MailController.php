<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Builder;

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

    public function send(Request $request)
    {  
        $request->validate([
            'to' => 'nullable|string|email|max:255',
            'from' => 'nullable|string|email|max:255',
            'subject' => 'nullable|string',
        ]);
    
        $query = Mail::with('user')->when(request('from'), function ($query) {
            return $query->whereHas('user', function (Builder $query) {
                $query->where('email', request('from'));
            });
        });
        
        $query->when(request('to'), function ($query) {
            return $query->where('to', request('to'));
        });
    
        $query->when(request('subject'), function ($query) {
            return $query->where('subject', request('subject'));
        });
    
        $query->orderBy('created_at', 'desc');
        
        $mails = $query->get();
    
        return response()->json($mails);
    }
}
