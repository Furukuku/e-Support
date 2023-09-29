<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\BHWController;
use App\Http\Controllers\Users\BusinessController;
use App\Http\Controllers\Users\ResidentController;
use App\Http\Controllers\Users\SubAdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\Admin\DocTemplates\BusinessClearance;

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


/*------------------------- Guest Middleware for Admins/Sub-admins -------------------------*/
Route::middleware(['guest:admin', 'guest:sub-admin'])->group(function(){
    // Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::view('/admin/login', 'auth.admins.admins-login')->name('admin.login');
});

Route::view('/clearance', 'admin.admin-brgy-clearance');
Route::view('/indigency', 'admin.admin-indigency');


/*------------------------- Guest Middleware for residents/companies -------------------------*/
Route::middleware(['guest:web', 'guest:business'])->group(function(){
    // Route::get('/login', [ResidentController::class, 'showLoginForm'])->name('resident.login'); // to login form route
    Route::view('/login', 'auth.users.login')->name('resident.login'); // to login form route
    // Route::get('/register-resident', [ResidentController::class, 'showRegisterForm'])->name('resident.register');
    Route::view('/register-resident', 'auth.users.register-resident')->name('resident.register');
    // Route::get('/register-company', [BusinessController::class, 'showRegisterForm'])->name('company.register');
    Route::view('/register-company', 'auth.users.register-company')->name('company.register');
});

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome'); // welcome route
Route::get('/program/{id}', [WelcomeController::class, 'showProgram'])->name('show.program');
Route::get('/programs', [WelcomeController::class, 'showPrograms'])->name('show.programs');
Route::get('/place/{id}', [WelcomeController::class, 'showPlace'])->name('show.place');
Route::get('/places', [WelcomeController::class, 'showPlaces'])->name('show.places');


Route::post('/admin/login-validate', [LoginController::class, 'adminValidate'])->name('admin.validate'); // admin, sub-admins/bhw login validation

/*------------------------- Start of Admin Routes -------------------------*/

Route::middleware('admin.auth:admin')->group(function() {
    Route::prefix('admin')->name('admin.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'adminLogout'])->name('logout');
        // Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::view('/dashboard', 'admin.admin-dashboard')->name('dashboard');
        // Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
        Route::view('/reports', 'admin.admin-reports')->name('reports');
        // Route::get('/message', [AdminController::class, 'message'])->name('message');
        Route::view('/message', 'admin.admin-message')->name('message');
        // Route::get('/programs', [AdminController::class, 'programs'])->name('programs');
        Route::view('/programs', 'admin.admin-programs')->name('programs');
        // Route::get('/audits', [AdminController::class, 'audits'])->name('audits');
        Route::view('/audits', 'admin.admin-audits')->name('audits');
        // Route::get('/places', [AdminController::class, 'places'])->name('places');
        Route::view('/places', 'admin.admin-places')->name('places');
        // Route::get('/archives', [AdminController::class, 'archives'])->name('archives');
        Route::view('/archives', 'admin.admin-archives')->name('archives');
        // Route::get('/account', [AdminController::class, 'account'])->name('account');
        Route::view('/account', 'admin.admin-account')->name('account');

        Route::name('profile.')->group(function(){
            // Route::get('/officials', [AdminController::class, 'brgyOfficials'])->name('officials');
            Route::view('/officials', 'admin.admin-profile-brgy-officials')->name('officials');
            // Route::get('/residents', [AdminController::class, 'residents'])->name('residents');
            Route::view('/residents', 'admin.admin-profile-residents')->name('residents');
        });

        Route::name('manage.')->group(function(){
            // Route::get('/staffs', [AdminController::class, 'staffs'])->name('staffs');
            Route::view('/staffs', 'admin.admin-manage-staffs')->name('staffs');
            // Route::get('/residents-business', [AdminController::class, 'residentsBusiness'])->name('residents-business');
            Route::view('/residents-business', 'admin.admin-manage-residents-business')->name('residents-business');
            // Route::get('/approval', [AdminController::class, 'approval'])->name('approval');
            Route::view('/approval', 'admin.admin-manage-approval')->name('approval');
        });

        Route::name('docs.')->group(function(){
            // Route::get('/clearance', [AdminController::class, 'clearance'])->name('clearance');
            Route::view('/clearance', 'admin.admin-docs-brgy-clearances')->name('brgy-clearance');
            // Route::get('/permit', [AdminController::class, 'permit'])->name('permit');
            Route::view('/permit', 'admin.admin-docs-biz-clearances')->name('biz-clearance');
            // Route::get('/indigency', [AdminController::class, 'indigency'])->name('indigency');
            Route::view('/indigency', 'admin.admin-docs-indigencies')->name('indigency');
        });

        Route::name('scan.')->group(function(){
            Route::view('/scan/business-clearance', 'admin.scan-biz-clearance')->name('biz-clearance');
        });

        Route::name('templates.')->group(function(){
            Route::view('/business-clearance/{document}', 'admin.admin-template-biz-clearance')->name('biz-clearance');
            Route::view('/barangay-clearance/{document}', 'admin.admin-template-brgy-clearance')->name('brgy-clearance');
            Route::view('/indigency/{document}', 'admin.admin-template-indigency')->name('indigency');
        });
    });
});
/*------------------------- End of Admin Routes -------------------------*/


/*------------------------- Start of Sub-Admin Routes -------------------------*/
Route::middleware(['sub-admin.auth:sub-admin', 'official:barangay official'])->group(function() {
    Route::prefix('sub-admin')->name('sub-admin.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'subAdminLogout'])->name('logout');
        Route::get('/dashboard', [SubAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/residents', [SubAdminController::class, 'residents'])->name('residents');
        Route::get('/reports', [SubAdminController::class, 'reports'])->name('reports');
        Route::get('/programs', [SubAdminController::class, 'programs'])->name('programs');
        Route::get('/places', [SubAdminController::class, 'places'])->name('places');
        Route::get('/account', [SubAdminController::class, 'account'])->name('account');

        Route::name('print.')->group(function(){
            Route::get('/clearance', [SubAdminController::class, 'clearance'])->name('clearance');
            Route::get('/permit', [SubAdminController::class, 'permit'])->name('permit');
            Route::get('/indigency', [SubAdminController::class, 'indigency'])->name('indigency');
        });
    });
});
/*------------------------- End of Sub-Admin Routes -------------------------*/


/*------------------------- Start of BHW Routes -------------------------*/
Route::middleware(['sub-admin.auth:sub-admin', 'bhw:bhw'])->group(function() {
    Route::prefix('bhw')->name('bhw.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'BHWLogout'])->name('logout');
        Route::get('/residents', [BHWController::class, 'residents'])->name('residents');
        Route::get('/patients', [BHWController::class, 'patients'])->name('patients');
        Route::view('/health-records/{patient}', 'bhw.bhw-health-records')->name('health-records');
        Route::view('/account', 'bhw.bhw-account')->name('account');
    });
});
/*------------------------- End of BHW Routes -------------------------*/


/*------------------------- Start of Residents Routes -------------------------*/
Route::post('/login-validate', [LoginController::class, 'residentValidate'])->name('user.validate'); // residents/business login validation route

Route::view('/resident-otp-verification', 'auth.users.otp-verifications.resident-otp')->middleware('auth:web')->name('resident-verification-mobile.notice');

Route::middleware('auth:web', 'resident-mobile.verified', 'resident.approval', 'resident.active')->group(function() {
    Route::prefix('resident')->name('resident.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'residentLogout'])->name('logout');
        Route::view('/home', 'resident.resident-home')->name('home');
        Route::view('/services', 'resident.resident-services')->name('services');
        Route::view('/profile', 'resident.resident-profile')->name('profile');

        Route::view('/business-clearance', 'resident.documents.business-clearance')->name('biz-clearance');
        Route::view('/indigency', 'resident.documents.indigency')->name('indigency');
        Route::view('/brgy-clearance', 'resident.documents.brgy-clearance')->name('brgy-clearance');

        Route::post('/business-clearance', [ResidentController::class, 'storeBizClearance'])->name('validate.biz-clearance');
        Route::post('/indigency', [ResidentController::class, 'storeIndigency'])->name('validate.indigency');
        Route::post('/brgy-clearance', [ResidentController::class, 'storeBrgyClearance'])->name('validate.brgy-clearance');

        Route::get('/qr-code/{token}', [ResidentController::class, 'showQr'])->name('qr-code');
        Route::get('/edit/documents/{id}/{token}', [ResidentController::class, 'editDocs'])->name('edit.docs');

        Route::patch('/update/brgy-clearance/{id}', [ResidentController::class, 'updateBrgyClearance'])->name('update.brgy-clearnce');
        Route::patch('/update/business-clearance/{id}', [ResidentController::class, 'updateBizClearance'])->name('update.biz-clearnce');
        Route::patch('/update/indigency/{id}', [ResidentController::class, 'updateIndigency'])->name('update.indigency');

        Route::view('/add-report', 'resident.reports.add-report')->name('add-report');
        Route::post('/report', [ResidentController::class, 'report'])->name('report');
        Route::get('/report/{report}/{id}', [ResidentController::class, 'viewReport'])->name('view.report');
        Route::patch('/update-report/{report}', [ResidentController::class, 'updateReport'])->name('update-report');


    });
});
/*------------------------- End of Residents Routes -------------------------*/


/*------------------------- Start of Business Routes -------------------------*/

Route::view('/company-otp-verification', 'auth.users.otp-verifications.company-otp')->middleware('auth:business')->name('company-verification-mobile.notice');

Route::middleware('business.auth:business', 'company-mobile.verified', 'company.approval', 'company.active')->group(function() {
    Route::prefix('business')->name('business.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'businessLogout'])->name('logout');
        Route::get('/home', [BusinessController::class, 'home'])->name('home');
    });
});
/*------------------------- End of Business Routes -------------------------*/