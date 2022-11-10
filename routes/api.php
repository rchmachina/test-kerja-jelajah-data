<?php

use App\Http\Controllers\NewscommentController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('/login', 'Auth\AuthController@login');
//     Route::group([
//         'middleware' => 'auth:api'
//       ], function() {
//         //   Route::get('/logout', 'Auth\AuthController@logout');
//         //   Route::get('/user', 'Auth\AuthController@user');
//    });
// });


Route::resource('/news/{news}/comment', NewscommentController::class);


Route::group(['middleware' => ['cors', 'json.response']], function () {

    // ...

    // public routes
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
    });
    // ...
Route::middleware('auth:api')->group(function () {
        // our routes to be protected will go in here
        Route::get('/news', NewsController::class)->middleware(['auth:api']);
    });
// });
// Route::middleware('auth:api')->get('/user/get', 'UserController@get');
