<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustemerReportController;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\InvoicesAttachmentController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDeteilController;
use App\Http\Controllers\InvoicesReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Models\Invoices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('markAsReadAll',[InvoicesController::class,'markAsReadAll'])->name('markAsReadAll');
Route::get('/', function () {
    return view('welcome');
});
Route::get('download/{invoice_number}/{file_name}', [InvoicesDeteilController::class,'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDeteilController::class,'open_file']);
Route::get('/section/{id}', [InvoicesController::class,'getProduct']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/invoices', InvoicesController::class);
Route::resource('/section', SectionController::class);
Route::resource('/product', ProductController::class);
Route::resource('/InvoiceAttachments', InvoicesAttachmentController::class);
Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);



Route::get('/Invoice_Paid', [InvoicesController::class,'Invoice_Paid']);
Route::get('/Invoice_UnPaid', [InvoicesController::class,'Invoice_UnPaid']);
Route::get('/Invoice_Partial', [InvoicesController::class,'Invoice_Partial']);
Route::get('/print_invoice/{id}', [InvoicesController::class,'print_invoice'])->name('print.invoice');

Route::resource('/Archive', InvoiceArchiveController::class);

Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');
/* Route::get('/Status_show/{id}', [InvoicesController::class,'show']); */

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});
Route::get('invoices_report',[InvoicesReportController::class,'index'])->name('invoices_report');
Route::post('Search_invoices', [InvoicesReportController::class,'Search_invoices']);
Route::get('customers_report', [CustemerReportController::class,'index'])->name("customers_report");
Route::post('Search_customers', [CustemerReportController::class,'Search_customers']);

Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');
Route::get('/{page}',[AdminController::class,'index']);

Route::get('/InvoicesDeteils/{id}',[InvoicesDeteilController::class,'edit'])->name('InvoicesDeteils');
Route::post('addImage',[InvoicesController::class,'addImage'])->name('add.image');


