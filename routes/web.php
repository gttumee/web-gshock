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
Route::get('/like/{id}', [Commoncontroller::class, 'like'])->name('like');

Route::post('/comment/get', [Commoncontroller::class, 'shop'])->name('comment.get');
Route::post('/',  [Commoncontroller::class, 'shop'])->name('shop.add');
Route::get('/',  [Commoncontroller::class, 'shop'])->name('shop');
Route::get('/detail',  [Commoncontroller::class, 'shopdetail'])->name('shopdetail');
Route::get('/order-confirm',  [Commoncontroller::class, 'orderconfirm'])->name('orderconfirm');