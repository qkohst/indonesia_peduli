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

Route::get('/program', 'LandingPageController@all')->name('home.all');
Route::get('/program/{id}', 'LandingPageController@show')->name('home.show');
Route::get('/program/kategori/{id}', 'LandingPageController@kategori')->name('home.kategori');
Route::get('/transparansi', 'LandingPageController@transparansi')->name('home.transparansi');

Route::get('komentar/{id}', 'Member\KomentarController@show')->name('komentar.show');

Route::get('auth/login', 'AuthController@view_login')->name('login');
Route::post('auth/login', 'AuthController@post_login')->name('login');
Route::get('auth/register', 'AuthController@view_register')->name('register');
Route::post('auth/register', 'AuthController@post_register')->name('register');

Route::get('tentang-kami', 'TentangKamiController@index')->name('tentang-kami.index');

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
            Route::post('penyaluran-dana', 'Admin\PenyaluranDanaController@store')->name('penyaluran-dana.store');

            Route::resource('set-tentang', 'Admin\TentangKamiController',  [
                'uses' => ['index', 'edit', 'update']
            ]);
            Route::resource('set-partner', 'Admin\PartnerController',  [
                'uses' => ['index', 'store', 'destroy']
            ]);
        });
    });

    // LANJUT PARTNER KAMI 

    // Route Member
    Route::group(['middleware' => 'checkRole:2'], function () {
        Route::group(['prefix' => 'member'], function () {
            Route::get('profile', 'Member\ProfileController@index')->name('member.profile');

            Route::resource('donasi', 'Member\DonasiController',  [
                'uses' => ['show', 'store']
            ]);

            Route::resource('payment', 'Member\PaymentController',  [
                'uses' => ['show', 'store', 'update']
            ]);

            Route::resource('donasi-saya', 'Member\DonasiSayaController',  [
                'uses' => ['index', 'show']
            ]);

            Route::post('komentar', 'Member\KomentarController@store')->name('komentar.store');
            Route::post('balas-komentar', 'Member\BalasKomentarController@store')->name('balas-komentar.store');

            Route::resource('like-program', 'Member\LikeProgramController',  [
                'uses' => ['store', 'destroy']
            ]);

            Route::resource('like-komentar', 'Member\LikeKomentarController',  [
                'uses' => ['store', 'destroy']
            ]);

            Route::resource('like-balas-komentar', 'Member\LikeBalasKomentarController',  [
                'uses' => ['store', 'destroy']
            ]);
        });
    });
});
