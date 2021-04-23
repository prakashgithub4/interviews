<?php

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
/* sign up */
Route::get('/', function () {
    $userId =\Auth::user();
    if(empty($userId)){
        return view('auth.login');
    }
   else{
       return redirect('/home');
   }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('register','AuthController@register')->name('signup');
/* api routes */