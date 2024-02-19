<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\AreaController;
use App\Http\Controllers\Dashboard\ContactSourceController;
use App\Http\Controllers\Dashboard\ActivityController;
use App\Http\Controllers\Dashboard\SubActivityController;
use App\Http\Controllers\Dashboard\ContactCategoryController;
use App\Http\Controllers\Dashboard\IndustryController;
use App\Http\Controllers\Dashboard\MajorController;
use App\Http\Controllers\Dashboard\JobTitleController;
use App\Http\Controllers\Dashboard\SavedReplyController;
use App\Http\Controllers\Dashboard\EmployeeTargetController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\MeetingController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\CampaignController;
use App\Http\Controllers\Dashboard\PointSettingController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\ImportController;
use App\Http\Controllers\Dashboard\AttachmentsController;
use App\Http\Controllers\Dashboard\TicketController;

use App\Http\Controllers\Dashboard\CategoryController;



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
    return view('auth.login');
});

Auth::routes(['register' => false]);

/****************************** START ADMIN ROUTES ******************************/
Route::Group(['prefix' => 'admin', 'middleware' => ['auth','lang']], function () {
    Route::prefix('lang')->name('lang.')->group( function () {
        Route::controller(LangController::class)->group( function () {
            Route::get('/ar' ,  'ar')->name('ar');
            Route::get('/en' ,  'en')->name('en');
        });
    });


    Route::get('/home', [HomeController::class, 'index'])->name('home');


    //category
    Route::resource('category', CategoryController::class);
    Route::post('categoryDeleteSelected', [CategoryController::class, 'deleteSelected'])->name('category.deleteSelected');
    Route::get('categoryShowNotification/{id}/{notification_id}', [CategoryController::class, 'showNotification'])->name('category.showNotification');



    //country
    Route::resource('country', CountryController::class);


    //city
    Route::resource('city', CityController::class);


    //area
    Route::resource('area', AreaController::class);
    Route::get('areaByCityId/{id}', [AreaController::class, 'areaByCityId']);


    //contactSource
    Route::resource('contactSource', ContactSourceController::class);


    //activity
    Route::resource('activity', ActivityController::class);


    //subActivity
    Route::resource('subActivity', SubActivityController::class);
    Route::get('subActivityByActivityId/{id}', [SubActivityController::class, 'subActivityByActivityId']);


    //contactCategory
    Route::resource('contactCategory', ContactCategoryController::class);


    //industry
    Route::resource('industry', IndustryController::class);


    //major
    Route::resource('major', MajorController::class);
    Route::get('majorByIndustryId/{id}', [MajorController::class, 'majorByIndustryId']);


    //jobTitle
    Route::resource('jobTitle', JobTitleController::class);


    //savedReply
    Route::resource('savedReply', SavedReplyController::class);


    //employeeTarget
    Route::resource('employeeTarget', EmployeeTargetController::class);


    //contact
    Route::resource('contact', ContactController::class);
    Route::post('contact/changeActive', [ContactController::class, 'changeActive'])->name('contact.changeActive');
    Route::post('contact/changeTrash', [ContactController::class, 'changeTrash'])->name('contact.changeTrash');
    Route::post('contact/relateEmployee', [ContactController::class, 'relateEmployee'])->name('contact.relateEmployee');
    Route::get('contactTrashed', [ContactController::class, 'trashed'])->name('contact.trashed');
    Route::post('contact/changeStatus', [ContactController::class, 'changeStatus'])->name('contact.changeStatus');
    Route::post('contactDeleteSelected', [ContactController::class, 'deleteSelected'])->name('contact.deleteSelected');
    Route::post('contactTrashSelected', [ContactController::class, 'trashSelected'])->name('contact.trashSelected');
    Route::post('contactActivateSelected', [ContactController::class, 'activateSelected'])->name('contact.activateSelected');
    Route::post('contactRelateSelected', [ContactController::class, 'relateSelected'])->name('contact.relateSelected');
    Route::get('contact/export/view', [ContactController::class, 'exportView'])->name('contact.exportView');
    Route::post('contact/export/data', [ContactController::class, 'exportData'])->name('contact.exportData');
    Route::post('contact/importData', [ContactController::class, 'importData'])->name('contact.importData');

    //meeting
    Route::resource('meeting', MeetingController::class);

    //message
    Route::resource('message', MessageController::class);


    //customer
    Route::resource('customer', CustomerController::class);
    Route::post('customer/addInvoice', [CustomerController::class, 'addInvoice'])->name('customer.addInvoice');
    Route::get('/customer/invoice/{invoice_id}/edit', [CustomerController::class,'editInvoice'])->name('customer.edit.invoice');
	Route::post('/customer/invoice/update', [CustomerController::class,'updateInvoice'])->name('customer.update.invoice');
    Route::get('customer/addParent/{id}', [CustomerController::class, 'addParent'])->name('customer.addParent');
    Route::post('customer/storeParent', [CustomerController::class, 'storeParent'])->name('customer.storeParent');
    Route::post('customer/addReminder', [CustomerController::class, 'addReminder'])->name('customer.addReminder');
    Route::post('customer/addAttachment', [CustomerController::class, 'addAttachment'])->name('customer.addAttachment');
    Route::get('customer/deleteAttachment/{id}', [CustomerController::class, 'deleteAttachment'])->name('customer.deleteAttachment');
    Route::post('customer/marketingRetargetResults', [CustomerController::class, 'postRetargetResults'])->name('customer.marketingPostRetargetResults');
    Route::post('customer/import', [CustomerController::class, 'import'])->name('customer.import');
    Route::post('customer/importData', [CustomerController::class, 'importData'])->name('customer.importData');



    //attachments
	Route::resource('attachments', AttachmentsController::class);
	Route::get('attachment_dt_ajax', [AttachmentsController::class,'dtajax']);
	Route::post('store-ajax', [AttachmentsController::class,'storeAjax'])->name('admin.attachments.store.ajax');
	Route::post('delete-ajax', [AttachmentsController::class,'deleteAjax'])->name('admin.attachments.delete.ajax');



    //import
    Route::post('import/fetch.excel/columns', [ImportController::class,'fetchExcelColumns'])->name('import.fetch.excel.columns');

    //campaign
    Route::resource('campaign', CampaignController::class);


    //pointSetting
    Route::resource('pointSetting', PointSettingController::class);


    //report
    Route::get('report/meetings',[ReportController::class, 'meetings'])->name('report.meetings');
    Route::get('report/meetingsReport',[ReportController::class, 'meetingsReport'])->name('report.meetingsReport');
    Route::get('report/contacts',[ReportController::class, 'contacts'])->name('report.contacts');
    Route::get('report/contactsReport',[ReportController::class, 'contactsReport'])->name('report.contactsReport');
    Route::get('report/employeeSales',[ReportController::class, 'employeeSales'])->name('report.employeeSales');
    Route::get('report/employeeSalesReport',[ReportController::class, 'employeeSalesReport'])->name('report.employeeSalesReport');
    Route::get('report/branchSales',[ReportController::class, 'branchSales'])->name('report.branchSales');
    Route::get('report/branchSalesReport',[ReportController::class, 'branchSalesReport'])->name('report.branchSalesReport');
    Route::get('report/activitySales',[ReportController::class, 'activitySales'])->name('report.activitySales');
    Route::get('report/activitySalesReport',[ReportController::class, 'activitySalesReport'])->name('report.activitySalesReport');



    //notification
    Route::resource('notification', NotificationController::class);
    Route::get('todayReminders', [NotificationController::class, 'todayReminders'])->name('todayReminders.index');
    Route::get('monthReminders', [NotificationController::class, 'monthReminders'])->name('monthReminders.index');



    //tickets
    Route::resource('tickets', TicketController::class);
    Route::post('tickets/{ticket}/change-status',[TicketController::class,'changeStatus'])->name('ticket.status.change');
    Route::post('tickets/{ticket}/assign-agent',[TicketController::class,'assignAgent'])->name('ticket.assign.agent');
    Route::post('tickets/{ticket}/reply',[TicketController::class,'replyToTicket'])->name('ticket.reply');



    //branch
    Route::resource('branch', BranchController::class);


    //department
    Route::resource('department', DepartmentController::class);


    //roles
    Route::resource('role', RoleController::class);
    Route::post('roleDelete', [RoleController::class, 'delete'])->name('role.delete');


    //user
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('userChangeStatus/{id}', [UserController::class, 'changeStatus'])->name('user.changeStatus');
    Route::get('employeeByBranchId/{id}', [UserController::class, 'employeeByBranchId']);
    Route::get('employeesSelect', [UserController::class,'ajaxEmployeesSelect'])->name('employees.ajax');



    //general routes
    Route::get('show_file/{folder_name}/{photo_name}', [GeneralController::class, 'show_file'])->name('show_file');
    Route::get('download_file/{folder_name}/{photo_name}', [GeneralController::class, 'download_file'])->name('download_file');
    Route::get('allNotifications', [GeneralController::class, 'allNotifications'])->name('allNotifications');
    Route::get('markAllAsRead', [GeneralController::class, 'markAllAsRead'])->name('markAllAsRead');

});
/****************************** END ADMIN ROUTES ******************************/
