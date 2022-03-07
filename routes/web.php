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
use App\Http\Requests\Test;


Route::group(['middleware'=>['auth']], function(){
    Route::post('/form-post', 'StudiesController@radios');
    Route::resource('/profile', 'ProfileController');
    Route::get('/', 'SiteController@index')->name('home');
    Route::resource('/studies', 'StudiesController');
});

Route::fallback(function () {
    return view('site.404');
});


Route::get('/logout', 'LoginController@logout');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@loginPost');
Route::resource('/register', 'RegisterController');
Route::resource('mail','MailController');
