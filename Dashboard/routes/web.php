<?php

use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AboutsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AdminController;
use App\Models\Contact;
use App\Models\User;
use App\Models\Booking;
use App\Models\payments;
use App\Models\Admin;
use Carbon\Carbon;



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
Route::middleware(['admin.auth'])->group(function () {
Route::get('/', function () {
    $totalTransactions = payments::count();
    $todayUsersCount = User::whereDate('created_at', Carbon::today())->count();
    $totalUsersCount = User::count();
    $totalRevenue = payments::sum('amount'); // Assuming the `amount` column stores the revenue
    $recentMessages = Contact::orderBy('created_at', 'desc')->take(5)->get();
    $recentPayments = Booking::orderBy('created_at', 'desc')->take(5)->get(); // Adjust as needed
    $messages = Contact::orderBy('created_at', 'desc')->take(5)->get(); // Fetch the latest messages
    return view('index', compact('messages', 'totalTransactions','todayUsersCount', 'totalUsersCount', 'totalRevenue', 'recentMessages', 'recentPayments'));
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

Route::resource('abouts', AboutsController::class);

Route::resource('contacts', ContactsController::class)->only(['index','edit','update']);

Route::get('payment',[paymentsController::class,'index'])->name('payment.index');
});
Route::get('/login',[AdminController::class,'create'])->name('login');
Route::get('/register',[AdminController::class,'register'])->name('register');
Route::post('/register',[AdminController::class,'createacount'])->name('register.store');
Route::post('/login',[AdminController::class,'login'])->name('login.store');
Route::get('/logout',[AdminController::class,'destroy'])->name('logout');

