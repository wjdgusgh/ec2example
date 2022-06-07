<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ApiController;


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

Route::get('/index', [ MainController::class, "main" ]);

Route::get('example', function() {
    return view('example');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/accountlist', function () {
    return view('accountlist');
});

Route::get('/account/{email}', function ($email) {
    return view('account', [ 'email' => $email ]);
});

Route::get('/croptest', function () {
    return view('croptest');
});

Route::get('/addtexttest', function () {
    return view('addtexttest');
});

Route::get('addtexttestt', function () {
    return view('addtexttestt');
});
