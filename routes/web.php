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

Route::get('/', function () {
    return redirect()->route('guests.home');
}); 

Route::namespace('Guest')->name('guests.')->group(function () {
    
    Route::get('/home', 'HomeController')->name('home');

    Route::resource('/posts', 'PostController');
});

// Route::get('/guest/home', function () {
//     return view('guests.home');
// })->name('guests.home'); 

// Route::prefix('guests')->group(function() {
//     Route::get('/posts', function () {
//         return view('guests.posts');
//     })->name('guests.posts');
// });

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
