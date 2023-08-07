<?php

use App\Http\Controllers\Commoncontroller;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/',  [Commoncontroller::class, 'index'])->name('index');
Route::post('/',  [Commoncontroller::class, 'index'])->name('index');
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
Route::post('/order',  [Commoncontroller::class, 'order'])->name('order');
Route::get('/request',  [Commoncontroller::class, 'request'])->name('request');
Route::post('/request',  [Commoncontroller::class, 'request'])->name('request');
Route::get('/mypage',  [Commoncontroller::class, 'mypage'])->name('mypage');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('login/facebook', [LoginController::class, 'redirectToProvider'])->name('facebook-login');
Route::get('login/facebook/callback', [LoginController::class, 'handleProviderCallback'])->name('facebook-logout');

route::get('mail',function(){
    return  view('ordermail');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');