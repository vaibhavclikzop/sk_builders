<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AjaxCall;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\BulkImport;
use App\Http\Controllers\InwardStock;
use App\Http\Controllers\LeadManagement;
use App\Http\Controllers\Masters;
use App\Http\Controllers\OrderManagement;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResetSoftware;
use App\Http\Controllers\Sales;
use App\Http\Controllers\Statement;
use App\Http\Controllers\StockReport;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\Route;

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

Route::get('/Clear', function () {

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
});

Route::get('reset-software/{key}', [ResetSoftware::class, 'ResetSoftware'])->name('reset-software');
Route::post('ResetSoftware', [ResetSoftware::class, 'ResetSoft'])->name('ResetSoftware');


Route::get('/', [Authentication::class, 'SuperAdmin'])->name('/');
Route::post('/', [Authentication::class, 'SuperAdminLogin'])->name('SuperAdminLogin');

Route::group(['middleware' => ['SuperAdmin']], function () {

    Route::get('settings', [Masters::class, 'settings'])->name('settings');
    Route::post('SaveSettings', [Masters::class, 'SaveSettings'])->name('SaveSettings');
    Route::get('logout', [Authentication::class, 'logout'])->name('Logout');
    Route::get('dashboard', [Admin::class, 'Dashboard'])->name('dashboard');
    Route::post('GetUserDetails', [Masters::class, 'GetUserDetails'])->name('GetUserDetails');
    Route::get('users', [Masters::class, 'users'])->name('users');
    Route::post('SaveUser', [Masters::class, 'SaveUser'])->name('SaveUser');
    Route::post('SaveTeam', [Masters::class, 'SaveTeam'])->name('SaveTeam');
    Route::get('user-role', [Masters::class, 'UserRole'])->name('user-role');

    Route::post('SaveRole', [Masters::class, 'SaveRole'])->name('SaveRole');

    Route::get('user-permission/{id}', [Masters::class, 'UserPermission'])->name('user-permission');

    Route::post('SaveUserPermission', [Masters::class, 'SaveUserPermission'])->name('SaveUserPermission');
    Route::post('RemovePermission', [Masters::class, 'RemovePermission'])->name('RemovePermission');

    // ajax call
    Route::post('GetCity', [Masters::class, 'GetCity'])->name('GetCity');
    Route::post('StartDay', [Admin::class, 'StartDay'])->name('StartDay');
    Route::post('EndDay', [Admin::class, 'EndDay'])->name('EndDay');
    Route::get('profile', [Admin::class, 'Profile'])->name('profile');
    Route::post('SaveProfile', [Admin::class, 'SaveProfile'])->name('SaveProfile');



    //masters
    Route::get('customers', [Masters::class, 'Customers'])->name('customers');
    Route::post('SaveCustomer', [Masters::class, 'SaveCustomer'])->name('SaveCustomer');
    Route::get('vendor', [Masters::class, 'vendor'])->name('vendor');
    Route::post('SaveVendor', [Masters::class, 'SaveVendor'])->name('SaveVendor');
    Route::get('office', [Masters::class, 'office'])->name('office');
    Route::post('SaveOffice', [Masters::class, 'SaveOffice'])->name('SaveOffice');

    Route::get('project', [Masters::class, 'project'])->name('project');
    Route::post('SaveProject', [Masters::class, 'SaveProject'])->name('SaveProject');


    Route::get('sub-account', [Masters::class, 'subAccount'])->name('sub-account');
    Route::post('SaveSubAccount', [Masters::class, 'SaveSubAccount'])->name('SaveSubAccount');


    //statements
    Route::get('statement/{status}', [Statement::class, 'statement'])->name('statement');
    Route::get('reports',[ReportController::class,"reports"])->name('reports');



    Route::post('importStatement', [Statement::class, 'importStatement'])->name('importStatement');
    Route::post('GetIds', [Statement::class, 'GetIds'])->name('GetIds');
    Route::post('updateStatement', [Statement::class, 'updateStatement'])->name('updateStatement');
    Route::post('addCashEntry', [Statement::class, 'addCashEntry'])->name('addCashEntry');

    //reports
    Route::get('customer-report', [Statement::class, 'customerReport'])->name('customer-report');
    Route::get('vendor-report', [Statement::class, 'vendorReport'])->name('vendor-report');
    Route::get('office-report', [Statement::class, 'officeReport'])->name('office-report');
    Route::get('project-report', [Statement::class, 'projectReport'])->name('project-report');
    Route::get('sub-account-report', [Statement::class, 'subAccountReport'])->name('sub-account-report');
    Route::get('save-customer-vendor',[Masters::class,"addCustomerVendor"])->name('addCustomerVendor');



    Route::post('GetStatementDetails', [Statement::class, 'GetStatementDetails'])->name('GetStatementDetails');
});
