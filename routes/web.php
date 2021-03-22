<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])
        ->middleware('auth')
        ->name('users');

Route::get('/users/create', [UserController::class, 'create'])
        ->middleware('auth')
        ->name('user.create');

Route::get('/users/{userId}/edit', [UserController::class, 'edit'])
        ->middleware('auth')
        ->name('user.edit');

Route::post('/users', [UserController::class, 'store'])
        ->middleware('auth')
        ->name('user.store');

Route::put('/users/{userId}', [UserController::class, 'update'])
        ->middleware('auth')
        ->name('user.update');

Route::delete('/users/{userId}', [UserController::class, 'delete'])
        ->middleware('auth')
        ->name('user.update');

Route::get('/mails/create', [MailController::class, 'create'])
        ->middleware('auth')
        ->name('mail.create');

Route::post('/mails', [MailController::class, 'store'])
        ->middleware('auth')
        ->name('mail.store');

Route::get('/mails', [MailController::class, 'index'])
        ->middleware('auth')
        ->name('mails');

require __DIR__.'/auth.php';
