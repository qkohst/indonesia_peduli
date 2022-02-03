<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    $title = 'Home';
    return view('landing-page.home', compact('title'));
});

Route::get('auth/login', 'AuthController@view_login')->name('login');
Route::post('auth/login', 'AuthController@post_login')->name('login');
Route::get('auth/register', 'AuthController@view_register')->name('register');
Route::post('auth/register', 'AuthController@post_register')->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('auth/logout', 'AuthController@logout')->name('logout');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'member'], function () {
        Route::get('profile', 'Member\ProfileController@index')->name('member.profile');
    });
});
