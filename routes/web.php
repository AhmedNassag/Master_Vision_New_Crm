<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerPortalController;
use App\Http\Controllers\AuthController as LoginCustomerController;

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



Route::get('/', function () {
    return view('home');
});

Route::get('/customer/login', function () {
    return view('customer-portal.login');
});

Route::get('/customer/login', [LoginCustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [LoginCustomerController::class, 'login']);
Route::middleware(['auth:customer'])->prefix('/customer')->group(function () {
    // Home route
    Route::get('home', [CustomerPortalController::class, 'home'])->name('customer.home');

    // Tickets routes
    Route::get('tickets', [CustomerPortalController::class, 'tickets'])->name('customer.tickets');
    Route::get('tickets/create', [CustomerPortalController::class, 'showCreateTicket'])->name('customer.tickets.create');
    Route::get('tickets/{ticket}', [CustomerPortalController::class, 'showTicket'])->name('customer.tickets.show');
    Route::post('tickets/{ticket}/reply', [CustomerPortalController::class, 'postReply'])->name('customer.ticket.reply');
    Route::post('tickets/create', [CustomerPortalController::class, 'storeTicket'])->name('customer.tickets.store');
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
