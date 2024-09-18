<?php

use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AboutsController;
use App\Http\Controllers\ContactsController;


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

Route::get('/', function () {
    return view('index');
});

Route::resource('users', UsersController::class)->except(['show']);

Route::resource('hotels', HotelsController::class);
Route::get('/hotels/{slug}', [HotelsController::class, 'show'])->name('hotels.show');

Route::resource('rooms', RoomsController::class)->except(['show']);
Route::get('{slug}/rooms', [RoomsController::class, 'create'])->name('rooms.create');
Route::get('/hotel/{slug}/rooms', [RoomsController::class, 'show'])->name('rooms.show');

Route::resource('booking',BookingController::class)->except(['show', 'create', 'store']);

Route::resource('blogs', BlogsController::class)->except(['show']);

Route::resource('banners', BannersController::class)->except(['show']);

Route::resource('abouts', AboutsController::class)->only(['index','edit','update']);

Route::resource('contacts', ContactsController::class)->only(['index','edit','update']);
