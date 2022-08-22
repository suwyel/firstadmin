<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\install\InstallController;
use GuzzleHttp\Middleware;

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

Route::middleware(['install'])->group(function () {
    Auth::routes(['register' => false]);
    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Auth::routes();

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', function () {
            return view('backend.layouts.app');
        });




        Route::resource('apps', 'App\Http\Controllers\AppController');
        Route::resource('live_matches', 'App\Http\Controllers\LiveMatchController');
    });
});






Route::get('/installation', 'App\Http\Controllers\Install\InstallController@index');
Route::get('install/database', 'App\Http\Controllers\Install\InstallController@database');
Route::post('install/process_install', 'App\Http\Controllers\Install\InstallController@process_install');
Route::get('install/create_user', 'App\Http\Controllers\Install\InstallController@create_user');
Route::post('install/store_user', 'App\Http\Controllers\Install\InstallController@store_user');
Route::get('install/system_settings', 'App\Http\Controllers\Install\InstallController@system_settings');
Route::post('install/finish', 'App\Http\Controllers\Install\InstallController@final_touch');