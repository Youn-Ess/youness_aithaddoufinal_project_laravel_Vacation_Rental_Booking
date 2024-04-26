<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CryptoController;
use App\Http\Controllers\DoubleAuthController;
use App\Http\Controllers\HistoryController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Support\Facades\Route;



// ? double auth routes
Route::get('/2fa', [DoubleAuthController::class, 'index'])->name('doubleAuth.index');
Route::post('/2fa/switchAuthOption', [DoubleAuthController::class, 'switchAuthOption'])->name('doubleAuth.switchAuthOption');
Route::post('/2fa/verityCode', [DoubleAuthController::class, 'verityCode'])->name('doubleAuth.verityCode');
Route::get('/2fa/resendCode', [DoubleAuthController::class, 'resendCode'])->name('doubleAuth.resendCode');

// ^ transfer routes
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified', '2fa'])->name('home.index');


// & Property routes

Route::get('properties/createImage', [PropertyController::class, 'createImage'])->name('properties.createImage');
Route::post('properties/storeImage', [PropertyController::class, 'storeImage'])->name('properties.storeImage');

Route::get('properties/', [PropertyController::class, 'index'])->name('properties.index');
Route::post('properties/', [PropertyController::class, 'store'])->name('properties.store')->middleware('role:owner');
Route::get('properties/create', [PropertyController::class, 'create'])->name('properties.create')->middleware('role:owner');
Route::get('properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
Route::put('properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
Route::delete('properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');



// ? Calendar routes
Route::get('calendar/{property}', [BookingController::class, 'show'])->name('calendar.show');
Route::post('calendar/', [BookingController::class, 'store'])->name('calendar.store');
Route::put('calendar/update', [BookingController::class, 'update'])->name('calendar.update');
Route::delete('calendar/delete', [BookingController::class, 'delete'])->name('calendar.delete');

// todo Cart routes
Route::get('cart', [CartController::class, 'index'])->name('cart.index');

// stripe 
Route::get('stripe', [CartController::class, 'session'])->name('stripe.session');
Route::get('success', [CartController::class, 'success'])->name('success');
Route::get('myHome', [CartController::class, 'myHome'])->name('myHome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
});

require __DIR__ . '/auth.php';