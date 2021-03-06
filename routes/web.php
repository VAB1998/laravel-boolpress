<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('guests.home');
}); 

Route::namespace('Guest')
    ->name('guests.')
    ->group(function () {
    
        Route::get('/home', 'HomeController')->name('home');

        Route::resource('/posts', 'PostController');

        Route::get('/contact-us', 'ContactUsController@contactUs')->name('contactUs');
        Route::post('/contact-us', 'ContactUsController@sendMail')->name('contactUs.send');
        Route::get('/contact-us/thanks', 'ContactUsController@thanks')->name('contactUs.thanks');
    });

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {

        Route::resource('/posts','PostController');
        
        Route::get('/', function() {
            return view('admin.home');
        })->name('home');
    });
