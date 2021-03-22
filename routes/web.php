<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/users', function () {
    $users = User::all();
    return view('user.users', ['users' => $users]);
})->middleware(['auth'])->name('users');

Route::get('/users/create', function () {
    return view('user.create');
})->middleware(['auth'])->name('user.create');

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

require __DIR__.'/auth.php';
