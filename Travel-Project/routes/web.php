<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesCotroller;
use App\Http\Controllers\HotelCotroller;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespaces'=>'Pages'],function(){
    Route::get('/',[PagesCotroller::class,'index'])->name('home');
    Route::get('/about',[PagesCotroller::class,'about'])->name('about');
    Route::get('/contact',[PagesCotroller::class,'contact'])->name('contact');
    Route::get('/blog',[PagesCotroller::class,'blog'])->name('blog');
});
Route::get('/hotels',[HotelCotroller::class,'index'])->name('hotels');
Route::get('/hotels/{slug}',[HotelCotroller::class,'show'])->name('hotels.show');

Route::get('/hotels/{slug}/{id}',[BookingController::class,'index'])->name('booking');
Route::post('/hotels/{slug}/{id}',[BookingController::class,'store'])->name('booking.store');
Route::get('/carts',[BookingController::class,'cart'])->name('cart');
Route::get('/carts/destroy/{id}',[BookingController::class,'destroy'])->name('cart.destroy');
Route::get('/booking/{id}/edit',[BookingController::class,'edit'])->name('cart.edit');
Route::put('/booking/{id}/update',[BookingController::class,'update'])->name('booking.update');

Route::get('/payment/{id}',[BookingController::class,'payment'])->name('payment');

