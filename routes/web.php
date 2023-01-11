<?php

use App\Http\Controllers\Commoncontroller;
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
Route::get('/index',  [Commoncontroller::class, 'index'])->name('index');
Route::get('/contact',  [Commoncontroller::class, 'contact'])->name('contact');
Route::post('/contact',  [Commoncontroller::class, 'contact'])->name('contact');
Route::get('/shop',  [Commoncontroller::class, 'shop'])->name('shop');
Route::get('/about',  [Commoncontroller::class, 'about'])->name('about');
Route::get('/shopdetail{id}',  [Commoncontroller::class, 'shopdetail'])->name('shopdetail');

Route::get('/', function () {
    return view('welcome');
});