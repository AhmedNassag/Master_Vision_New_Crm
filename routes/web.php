<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerPortalController;
use App\Http\Controllers\AuthController as LoginCustomerController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\Dashboard\CustomerController;

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


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('migrate');

    return "Cache Cleared Successfully";
});

Route::get('/migrate', function () {
    Artisan::call('migrate');

    return "Migrate Done Successfully";
});

Route::get('/db-seed', function () {
    Artisan::call('db:seed');

    return "DB Seed Done Successfully";
});

Route::get('/migrate-fresh-seed', function () {
    Artisan::call('migrate:fresh --seed');

    return "Migrate Fresh Seed Done Successfully";
});

Route::get('/', function () {
    return view('home');
})->middleware('guest:customer')->middleware('lang');

Route::get('/customer/login', function () {
    return view('customer-portal.login');
})->middleware('guest:customer');

Route::get('/customer/login', [LoginCustomerController::class, 'showLoginForm'])->name('customer.login')->middleware('guest:customer');
Route::post('/customer/login', [LoginCustomerController::class, 'login']);
Route::middleware(['auth:customer', 'lang', 'ActivePackage'])->prefix('/customer')->group(function () {
    // Home route
    Route::get('home', [CustomerPortalController::class, 'home'])->name('customer.home');

    // Tickets routes
    Route::get('tickets', [CustomerPortalController::class, 'tickets'])->name('customer.tickets');
    Route::get('tickets/create', [CustomerPortalController::class, 'showCreateTicket'])->name('customer.tickets.create');
    Route::get('tickets/{ticket}', [CustomerPortalController::class, 'showTicket'])->name('customer.tickets.show');
    Route::post('tickets/{ticket}/reply', [CustomerPortalController::class, 'postReply'])->name('customer.ticket.reply');
    Route::post('tickets/create', [CustomerPortalController::class, 'storeTicket'])->name('customer.tickets.store');

    //Customer Prodile
    Route::get('profile/edit/{id}', [CustomerProfileController::class,'edit'])->name('profile.edit');
    Route::put('profileUpdate', [CustomerProfileController::class, 'update'])->name('profile.update');
    Route::get('edit/password/{id}', [CustomerProfileController::class,'editPassword'])->name('password.edit');
    Route::patch('passwordUpdate', [CustomerProfileController::class, 'updatePassword'])->name('profile.password.update');
});


/* ================== Homepage + Admin Routes ================== */
// require __DIR__.'/dashboard.php';



/*
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);
Route::get('/home', [HomeController::class, 'index']);
*/
