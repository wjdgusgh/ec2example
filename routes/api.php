<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/test', [ ApiController::class, "test" ] );
Route::get('/json', [ ApiController::class, "json" ] );
Route::get('/webpages', [ ApiController::class, "webpages"]);

Route::post('/newaccount', [ ApiController::class, "signup" ]);
Route::get('/account/{email}', [ ApiController::class, "getEmail" ]);
Route::get('/accountlist', [ ApiController::class, "getAccountList" ]);
Route::get('/accountinfo/{email}', [ ApiController::class, "getAccountInfo" ]);

Route::get('/wowmagazine', [ ApiController::class, "wowmagazine" ]);
