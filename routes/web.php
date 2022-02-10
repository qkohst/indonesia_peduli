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

Route::get('/unauthorized', function () {
    $title = 'Unauthorized';
    return view('errorpages.401', compact('title'));
});

Route::get('/', 'LandingPageController@index')->name('home');
Route::get('/program/{id}', 'LandingPageController@show')->name('home.show');

Route::get('auth/login', 'AuthController@view_login')->name('login');
Route::post('auth/login', 'AuthController@post_login')->name('login');
Route::get('auth/register', 'AuthController@view_register')->name('register');
Route::post('auth/register', 'AuthController@post_register')->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('auth/logout', 'AuthController@logout')->name('logout');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Route Admin
    Route::group(['middleware' => 'checkRole:1'], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::resource('kategori-donasi', 'Admin\KategoriDonasiController',  [
                'uses' => ['index', 'store', 'destroy']
            ]);
            Route::resource('program-donasi', 'Admin\ProgramDonasiController');
        });
    });

    // Route Member
    Route::group(['middleware' => 'checkRole:2'], function () {
        Route::group(['prefix' => 'member'], function () {
            Route::get('profile', 'Member\ProfileController@index')->name('member.profile');
        });
    });
});
