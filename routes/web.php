<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


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

Route::post('/login-usuario', [LoginController::class, 'makeLogin'])->name('makeLogin');
Route::post('/logout-usuario', [LoginController::class, 'makeLogout'])->name('makeLogout');

Auth::routes();





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
