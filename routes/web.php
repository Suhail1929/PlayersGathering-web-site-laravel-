<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
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
Route::resource('events', EventsController::class);

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    [App\Http\Controllers\EventsController::class, 'index'])->name('dashboard');
Route::get('page1', function () { return view("page1"); })->middleware('auth');
