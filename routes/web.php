<?php

use App\Http\Controllers\AdminController;
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
use Database\Seeders\AdminSeeder;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    // ? double auth routes
    Route::get('/2fa', [DoubleAuthController::class, 'index'])->name('doubleAuth.index');
    Route::post('/2fa/switchAuthOption', [DoubleAuthController::class, 'switchAuthOption'])->name('doubleAuth.switchAuthOption');
    Route::post('/2fa/verityCode', [DoubleAuthController::class, 'verityCode'])->name('doubleAuth.verityCode');
    Route::get('/2fa/resendCode', [DoubleAuthController::class, 'resendCode'])->name('doubleAuth.resendCode');

    // ^ transfer routes
    Route::get('/home', [HomeController::class, 'index'])->middleware(['verified', '2fa'])->name('home.index');


    // & Property routes


    Route::get('properties/', [PropertyController::class, 'index'])->name('properties.index');
    Route::post('properties/store', [PropertyController::class, 'store'])->name('properties.store')->middleware('role:owner');
    Route::get('properties/create', [PropertyController::class, 'create'])->name('properties.create')->middleware('role:owner');
    Route::get('properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
    Route::get('properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit')->middleware('role:owner');
    Route::put('properties/{property}', [PropertyController::class, 'update'])->name('properties.update')->middleware('role:owner');
    Route::delete('properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy')->middleware('role:owner');

    Route::get('properties/createImage/{property_id}', [PropertyController::class, 'createImage'])->name('properties.createImage')->middleware('role:owner');
    Route::post('properties/storeImage', [PropertyController::class, 'storeImage'])->name('properties.storeImage')->middleware('role:owner');


    // ? Calendar routes
    Route::get('calendar/{property}', [BookingController::class, 'show'])->name('calendar.show');
    Route::post('calendar/', [BookingController::class, 'store'])->name('calendar.store');
    Route::put('calendar/update', [BookingController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/delete', [BookingController::class, 'delete'])->name('calendar.delete');

    // todo Cart routes
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');

    // & stripe routes
    Route::get('stripe', [CartController::class, 'session'])->name('stripe.session');
    Route::get('success', [CartController::class, 'success'])->name('success');
    Route::get('myHome', [CartController::class, 'myHome'])->name('myHome');

    //* admin routes
    Route::middleware('role:admin')->group(function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('admin/editUser/{user}', [AdminController::class, 'editUser'])->name('admin.editUser');
        Route::patch('admin/updateUser/{user}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
        Route::delete('admin/destroyUser/{user}', [AdminController::class, 'destroyUser'])->name('admin.destroyUser');
        Route::get('admin/properties_index/{id}', [AdminController::class, 'properties_index'])->name('admin.properties_index');
        Route::get('admin/properties_edit/{property}', [AdminController::class, 'properties_edit'])->name('admin.properties_edit');
        Route::put('admin/properties_update/{property}', [AdminController::class, 'properties_update'])->name('admin.properties_update');
        Route::delete('admin/properties_destroy/{property}', [AdminController::class, 'properties_destroy'])->name('admin.properties_destroy');
        Route::get('admin/calendar_show/{property}', [AdminController::class, 'calendar_show'])->name('admin.calendar_show');
        Route::put('admin/update_calendar', [AdminController::class, 'update_calendar'])->name('admin.update_calendar');
        Route::delete('admin/delete_calendar', [AdminController::class, 'destroy_calendar'])->name('admin.destroy_calendar');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
});

require __DIR__ . '/auth.php';
