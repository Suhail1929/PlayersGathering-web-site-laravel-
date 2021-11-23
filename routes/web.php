<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersGestionController;
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
    return view('index');
});
Route::get('/users', function () {
    return view('users.ListUtilisateur');
});
Route::resource('events', EventsController::class);
Route::resource('users', UsersGestionController::class);
Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    [App\Http\Controllers\EventsController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified','admin'])->get(
        '/users',
        [App\Http\Controllers\UsersGestionController::class, 'index'])->name('users');



