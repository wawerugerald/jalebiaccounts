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
    return view('welcome');
});

Auth::routes();
//Admin Middleware
Route::group(['middleware'=>['auth','admin']], function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/contact', 'FrontendController@contact')->name('contact');
    Route::get('/user-list','UserController@index')->name('users.index');

    Route::delete('/user/{id}', 'UserController@destroy')->name('users.destroy');
});
//Accountant Middleware
Route::group(['middleware'=>['auth','accountant']], function (){

    Route::get('/accdashboard', function(){
        return view('admin.accdashboard');
    });
});
Route::get('/home', 'HomeController@index')->name('home');
