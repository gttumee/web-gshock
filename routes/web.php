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
Route::post('/shop',  [Commoncontroller::class, 'shop'])->name('shop');

Route::get('/about',  [Commoncontroller::class, 'about'])->name('about');
Route::get('/history',  [Commoncontroller::class, 'history'])->name('history');
Route::get('/technology',  [Commoncontroller::class, 'technology'])->name('technology');
Route::get('/mygshock',  [Commoncontroller::class, 'mygshock'])->name('mygshock');
Route::get('/shopdetail',  [Commoncontroller::class, 'shopdetail'])->name('shopdetail');
Route::get('/order-confirm',  [Commoncontroller::class, 'orderconfirm'])->name('orderconfirm');
Route::get('/order',  [Commoncontroller::class, 'order'])->name('order');


Route::get('/', function () {
    return view('welcome');
});