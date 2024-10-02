<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesCotroller;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SessionController;


Route::group(['namespaces' => 'Pages'], function () {
    Route::get('/', [PagesCotroller::class, 'index'])->name('home');
    Route::get('/about', [PagesCotroller::class, 'about'])->name('about');
    Route::get('/contact', [PagesCotroller::class, 'contact'])->name('contact');
    Route::get('/blog', [PagesCotroller::class, 'blog'])->name('blog');
});
Route::middleware(['auth'])->group(function () {

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    Route::resource('booking', BookingController::class);
    Route::get('/booking/{slug}/{id}', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/hotels/{slug}/{id}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/carts', [BookingController::class, 'cart'])->name('cart');

    Route::get('/payment', [BookingController::class, 'payment'])->name('payment.index');
    Route::post('/payment', [BookingController::class, 'paymentstore'])->name('payment.store');

    Route::get('/myprofile', [MyprofileController::class, 'index'])->name('myprofile.index');
    Route::get('/myprofile/edit', [MyprofileController::class, 'edit'])->name('myprofile.edit');
    Route::put('/myprofile/edit', [MyprofileController::class, 'update'])->name('myprofile.update');

    Route::resource('reviews', ReviewsController::class);

    Route::get('/availableDays/{id}', [BookingController::class, 'availableDays'])->name('availableDays');

});
Route::resource('hotels', HotelController::class)->only(['index', 'show']);
Route::group(['namespace' => 'Users'], function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('password/forgot', [RegisteredUserController::class, 'showForgetPasswordForm'])->name('password.request');
    Route::post('password/email', [RegisteredUserController::class, 'reset'])->name('password.update');
    Route::get('/login',[SessionController::class, 'create'])->name('login');
    Route::post('/login',[SessionController::class, 'store'])->name('login.store');
    Route::get('/logout',[SessionController::class, 'destroy'])->name('logout');
});





