<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
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

Route::get('/lat1','App\Http\Controllers\Lat1Controller@index');
Route::get('/lat1/m2','App\Http\Controllers\Lat1Controller@method2');
Route::resource('product', 'App\Http\Controllers\ProductController');

Route::get('/login', function () {
    if (Auth::check()) return redirect('/product');
    return view('login');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::post('/auth',[SiteController::class,'auth']);
