<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesCotroller;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisteredUser;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\ContactController;

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

Route::post('/contact',[ContactController::class,'store'])->name('contact.store');

Route::resource('hotels', HotelController::class)->only(['index', 'show']);
Route::resource('booking', BookingController::class);

Route::get('/booking/{slug}/{id}',[BookingController::class,'index'])->name('booking.index');
Route::post('/hotels/{slug}/{id}',[BookingController::class,'store'])->name('booking.store');
Route::get('/carts',[BookingController::class,'cart'])->name('cart');


Route::get('/payment',[BookingController::class,'payment'])->name('payment.index');
Route::post('/payment',[BookingController::class,'paymentstore'])->name('payment.store');

Route::group(['namespace'=>'Users'],function(){
    Route::get('register', [RegisteredUser::class,'create'])->name('register');
    Route::post('register', [RegisteredUser::class,'store'])->name('register.store');
    Route::get('password/forgot', [RegisteredUser::class, 'showForgetPasswordForm'])->name('password.request');
    Route::post('password/email', [RegisteredUser::class, 'forgetPassword'])->name('password.email');
    Route::get('password/reset/{token}', [RegisteredUser::class, 'showResetForm'])->name('password.reset');
});

Route::get('/login',[AdminController::class,'create'])->name('login');
Route::post('/login',[AdminController::class,'store'])->name('login.store');

Route::post('/logout',[AdminController::class,'destroy'])->name('logout.destroy');

Route::resource('reviews',ReviewsController::class);

Route::get('/myprofile',[MyprofileController::class,'index'])->name('myprofile.index');
Route::get('/myprofile/edit',[MyprofileController::class,'edit'])->name('myprofile.edit');
Route::put('/myprofile/edit',[MyprofileController::class,'update'])->name('myprofile.update');
