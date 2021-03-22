<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/mails', function (Request $request) {

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
    dump("MAIIILLL", $mails);
    exit;
    return $request->user();
});
