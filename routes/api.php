<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

############################## Start Admin Routes ##############################
Route::group(['prefix' => 'admin'], function($router)
{
    //Auth routes
    Route::group(['middleware' => 'api','prefix' => 'auth'], function($router)
    {
        Route::get('me', [App\Http\Controllers\Api\Admin\AuthController::class, 'me']);
        Route::post('register', [App\Http\Controllers\Api\Admin\AuthController::class, 'register']);
        Route::post('login', [App\Http\Controllers\Api\Admin\AuthController::class, 'login']);
        Route::post('logout', [App\Http\Controllers\Api\Admin\AuthController::class, 'logout']);
        Route::post('refresh', [App\Http\Controllers\Api\Admin\AuthController::class, 'refresh']);
        Route::post('change-password', [App\Http\Controllers\Api\Admin\AuthController::class, 'changePassword']);
        Route::post('update-profile', [App\Http\Controllers\Api\Admin\AuthController::class, 'updateProfile']);
    });



    //User must be have token to be able to visit those routes
    Route::group(['middleware' => 'jwtMiddleware'],function()
    {
        //home
        Route::get('home', [App\Http\Controllers\Api\Admin\HomeController::class, 'index']);

        //referenceData
        Route::get('branches', [App\Http\Controllers\Api\Admin\ReferenceDataController::class, 'getBranches']);
        Route::get('referenceData', [App\Http\Controllers\Api\Admin\ReferenceDataController::class, 'referenceData']);

        //contact
        Route::get('contacts', [App\Http\Controllers\Api\Admin\ContactController::class, 'index']);
        Route::get('contacts/{id}', [App\Http\Controllers\Api\Admin\ContactController::class, 'show']);
        Route::get('contact', [App\Http\Controllers\Api\Admin\ContactController::class, 'create']);
        Route::post('contacts', [App\Http\Controllers\Api\Admin\ContactController::class, 'store']);
        Route::get('contact/{id}', [App\Http\Controllers\Api\Admin\ContactController::class, 'edit']);
        Route::post('contacts/{id}', [App\Http\Controllers\Api\Admin\ContactController::class, 'update']);
        Route::delete('contacts/{id}', [App\Http\Controllers\Api\Admin\ContactController::class, 'destroy']);
        Route::get('contacts-changeActive/{id}', [App\Http\Controllers\Api\Admin\ContactController::class, 'changeActive']);
        Route::get('contacts-changeTrash/{id}', [App\Http\Controllers\Api\Admin\ContactController::class, 'changeTrash']);
        Route::post('contacts-changeRelateEmployee/{id}', [App\Http\Controllers\Api\Admin\ContactController::class, 'changeRelateEmployee']);
        Route::post('contacts-changeStatus', [App\Http\Controllers\Api\Admin\ContactController::class, 'changeStatus']);
        Route::get('contacts-trashed', [App\Http\Controllers\Api\Admin\ContactController::class, 'trashed']);

        //customer
        Route::get('customers', [App\Http\Controllers\Api\Admin\CustomerController::class, 'index']);
        Route::get('customers/{id}', [App\Http\Controllers\Api\Admin\CustomerController::class, 'show']);
        Route::get('customer', [App\Http\Controllers\Api\Admin\CustomerController::class, 'create']);
        Route::post('customers', [App\Http\Controllers\Api\Admin\CustomerController::class, 'store']);
        Route::get('customer/{id}', [App\Http\Controllers\Api\Admin\CustomerController::class, 'edit']);
        Route::post('customers/{id}', [App\Http\Controllers\Api\Admin\CustomerController::class, 'update']);
        Route::delete('customers/{id}', [App\Http\Controllers\Api\Admin\CustomerController::class, 'destroy']);
        Route::post('customers-storeParent', [App\Http\Controllers\Api\Admin\CustomerController::class, 'storeParent']);
        Route::post('customers-addInvoice', [App\Http\Controllers\Api\Admin\CustomerController::class, 'addInvoice']);
        Route::post('customers-updateInvoice/{id}', [App\Http\Controllers\Api\Admin\CustomerController::class,'updateInvoice']);
        Route::post('customers-addReminder', [App\Http\Controllers\Api\Admin\CustomerController::class, 'addReminder']);
        Route::post('customers-addAttachment', [App\Http\Controllers\Api\Admin\CustomerController::class, 'addAttachment']);
        Route::delete('customers-deleteAttachment/{id}', [App\Http\Controllers\Api\Admin\CustomerController::class, 'deleteAttachment']);
        Route::post('customers-marketingRetargetResults', [App\Http\Controllers\Api\Admin\CustomerController::class, 'postRetargetResults']);
        Route::post('customers-makePassword', [App\Http\Controllers\Api\Admin\CustomerController::class, 'makePassword']);


        //notification
        Route::get('notifications', [App\Http\Controllers\Api\Admin\NotificationController::class, 'index']);
        Route::get('notifications/{id}', [App\Http\Controllers\Api\Admin\NotificationController::class, 'show']);
        Route::post('notifications', [App\Http\Controllers\Api\Admin\NotificationController::class, 'store']);
        Route::post('notifications/{id}', [App\Http\Controllers\Api\Admin\NotificationController::class, 'update']);
        Route::delete('notifications/{id}', [App\Http\Controllers\Api\Admin\NotificationController::class, 'destroy']);
        Route::get('todayReminders', [App\Http\Controllers\Api\Admin\NotificationController::class, 'todayReminders']);
        Route::get('monthReminders', [App\Http\Controllers\Api\Admin\NotificationController::class, 'monthReminders']);

    Route::get('allNotifications', [App\Http\Controllers\Api\Admin\NotificationController::class, 'allNotifications']);
    Route::get('unreadNotifications', [App\Http\Controllers\Api\Admin\NotificationController::class, 'unreadNotifications']);
    Route::get('readNotifications', [App\Http\Controllers\Api\Admin\NotificationController::class, 'readNotifications']);
    Route::get('markAsReadNotifications', [App\Http\Controllers\Api\Admin\NotificationController::class, 'markAsReadNotifications']);


        //tickets
        Route::get('tickets', [App\Http\Controllers\Api\Admin\TicketController::class, 'index']);
        Route::get('tickets/{id}', [App\Http\Controllers\Api\Admin\TicketController::class, 'show']);
        Route::post('tickets/changeStatus/{id}', [App\Http\Controllers\Api\Admin\TicketController::class, 'changeStatus']);
        Route::post('tickets/assignAgent/{id}', [App\Http\Controllers\Api\Admin\TicketController::class, 'assignAgent']);
        Route::post('tickets/replyToTicket/{id}',[App\Http\Controllers\Api\Admin\TicketController::class,'replyToTicket']);

        //report
        Route::get('report/meetings',[App\Http\Controllers\Api\Admin\ReportController::class, 'meetings']);
        Route::get('report/meetingsReport',[App\Http\Controllers\Api\Admin\ReportController::class, 'meetingsReport']);
        Route::get('report/contacts',[App\Http\Controllers\Api\Admin\ReportController::class, 'contacts']);
        Route::get('report/contactsReport',[App\Http\Controllers\Api\Admin\ReportController::class, 'contactsReport']);
        Route::get('report/employeeSales',[App\Http\Controllers\Api\Admin\ReportController::class, 'employeeSales']);
        Route::get('report/employeeSalesReport',[App\Http\Controllers\Api\Admin\ReportController::class, 'employeeSalesReport']);
        Route::get('report/branchSales',[App\Http\Controllers\Api\Admin\ReportController::class, 'branchSales']);
        Route::get('report/branchSalesReport',[App\Http\Controllers\Api\Admin\ReportController::class, 'branchSalesReport']);
        Route::get('report/activitySales',[App\Http\Controllers\Api\Admin\ReportController::class, 'activitySales']);
        Route::get('report/activitySalesReport',[App\Http\Controllers\Api\Admin\ReportController::class, 'activitySalesReport']);
    });
});
############################## End Admin Routes ##############################





############################## Start Customer Routes ##############################
//Auth routes
Route::group(['middleware' => 'api','prefix' => 'auth'], function($router)
{
    Route::post('register', [App\Http\Controllers\Api\Customer\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\Api\Customer\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Api\Customer\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\Api\Customer\AuthController::class, 'refresh']);
    Route::post('change-password', [App\Http\Controllers\Api\Customer\AuthController::class, 'changePassword']);
    Route::post('update-profile', [App\Http\Controllers\Api\Customer\AuthController::class, 'updateProfile']);
});


//Customrt must be have token to be able to visit those routes
Route::group(['middleware' => 'jwtMiddleware'],function()
{
    //customer-home
    Route::get('customer-home', [App\Http\Controllers\Api\Customer\CustomerController::class, 'home']);

    //customer-tickets
    Route::get('customer-tickets', [App\Http\Controllers\Api\Customer\CustomerController::class, 'tickets']);
    Route::get('customer-tickets/create', [App\Http\Controllers\Api\Customer\CustomerController::class, 'createTicket']);
    Route::post('customer-tickets/store', [App\Http\Controllers\Api\Customer\CustomerController::class, 'storeTicket']);
    Route::get('customer-tickets/{ticket}', [App\Http\Controllers\Api\Customer\CustomerController::class, 'showTicket']);
    Route::post('customer-tickets/{ticket}/reply', [App\Http\Controllers\Api\Customer\CustomerController::class, 'replyTicket']);

    //customer-notifications
    Route::get('customer-allNotifications', [App\Http\Controllers\Api\Customer\NotificationController::class, 'allNotifications']);
    Route::get('customer-unreadNotifications', [App\Http\Controllers\Api\Customer\NotificationController::class, 'unreadNotifications']);
    Route::get('customer-readNotifications', [App\Http\Controllers\Api\Customer\NotificationController::class, 'readNotifications']);
    Route::get('customer-markAsReadNotifications', [App\Http\Controllers\Api\Customer\NotificationController::class, 'markAsReadNotifications']);
});
############################## End Customer Routes ##############################
