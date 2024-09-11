<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//return view('index');
//})->name('site');

//Route::get('/home', function () {
//return view('home');
//})->name('home');

Route::resource('/permission', 'App\Http\Controllers\PermissionController');
Route::resource('/usuario', 'App\Http\Controllers\UserController');
