<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
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
Route::middleware(['guest:admin', 'guest:sub-admin', 'guest:bhw'])->group(function(){
    // Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::view('/nancayasan/login', 'auth.admins.admins-login')->name('admin.login');
});

Route::view('/clearance', 'admin.admin-brgy-clearance');
Route::view('/indigency', 'admin.admin-indigency');


/*------------------------- Guest Middleware for residents/companies -------------------------*/
Route::middleware(['guest:web', 'guest:business'])->group(function(){
    Route::view('/login', 'auth.users.login')->name('resident.login'); // to login form route
    
    Route::view('/register-resident', 'auth.users.register-resident')->name('resident.register');
    Route::view('/privacy-policy', 'auth.users.agreements.privacy-policy')->name('privacy-policy');
    Route::view('/terms-and-conditions', 'auth.users.agreements.terms-conditions')->name('terms-conditions');

    Route::view('/register-company', 'auth.users.register-company')->name('company.register');
    Route::view('/business/terms-and-conditions', 'auth.users.business-agreements.terms-conditions')->name('business.terms-conditions');
});


Route::middleware(['guest:web', 'guest:business', 'guest:admin', 'guest:sub-admin', 'guest:bhw'])->group(function(){
    Route::view('/forgot-password', 'auth.users.forgot-password')->name('users.forgot-password');
    Route::post('/forgotPassword', [ResetPasswordController::class, 'sendLink'])->name('users.password-reset.send-link');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPasswordForm'])->name('password.reset');
    Route::post('/resetPassword', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});



Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome'); // welcome route
Route::get('/about-us', [WelcomeController::class, 'aboutUs'])->name('about');
Route::get('/program/{id}', [WelcomeController::class, 'showProgram'])->name('show.program');
Route::get('/programs', [WelcomeController::class, 'showPrograms'])->name('show.programs');
Route::get('/place/{id}', [WelcomeController::class, 'showPlace'])->name('show.place');
Route::get('/places', [WelcomeController::class, 'showPlaces'])->name('show.places');
Route::get('/search-places', [WelcomeController::class, 'searchPlace'])->name('search.place');


Route::post('/admin/login-validate', [LoginController::class, 'adminValidate'])->name('admin.validate'); // admin, sub-admins/bhw login validation

/*------------------------- Start of Admin Routes -------------------------*/

Route::middleware('admin.auth:admin')->group(function() {
    Route::prefix('nancayasan')->name('admin.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'adminLogout'])->name('logout');

        Route::get('/mark-as-read-report', [AdminController::class, 'markReport'])->name('mark-report');
        Route::get('/mark-as-read-brgy-clearance', [AdminController::class, 'markBrgyClearance'])->name('mark-brgy-clearance');
        Route::get('/mark-as-read-biz-clearance', [AdminController::class, 'markBizClearance'])->name('mark-biz-clearance');
        Route::get('/mark-as-read-indigency', [AdminController::class, 'markIndigency'])->name('mark-indigency');
        // Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::view('/dashboard', 'admin.admin-dashboard')->name('dashboard');
        Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
        // Route::view('/reports', 'admin.admin-reports')->name('reports');
        Route::get('/assistance', [AdminController::class, 'assistance'])->name('assitance');
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
        Route::view('/settings', 'admin.admin-settings')->name('settings');

        Route::prefix('generate-report')->name('generate-report.')->group(function() {
            Route::get('/business-clearances/{from}/{to}', [AdminController::class, 'generateReportBizClearances'])->name('biz-clearance');
            Route::get('/barangay-clearances/{from}/{to}', [AdminController::class, 'generateReportBrgyClearances'])->name('brgy-clearance');
            Route::get('/indigencies/{from}/{to}', [AdminController::class, 'generateReportIndigencies'])->name('indigency');
        });
        
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
            Route::view('/business', 'admin.admin-manage-business')->name('business');
            // Route::get('/approval', [AdminController::class, 'approval'])->name('approval');
            Route::view('/resident', 'admin.admin-manage-resident')->name('resident');
        });
        
        Route::name('docs.')->group(function(){
            Route::get('/brgy-clearances', [AdminController::class, 'brgyClearances'])->name('brgy-clearances');
            // Route::view('/clearance', 'admin.admin-docs-brgy-clearances')->name('brgy-clearance');
            Route::get('/biz-clearances', [AdminController::class, 'bizClearances'])->name('biz-clearances');
            // Route::view('/permit', 'admin.admin-docs-biz-clearances')->name('biz-clearance');
            Route::get('/indigencies', [AdminController::class, 'indigencies'])->name('indigencies');
            // Route::view('/indigency', 'admin.admin-docs-indigencies')->name('indigency');
        });
        
        Route::name('scan.')->group(function(){
            Route::view('/scan/business-clearance', 'admin.scan-biz-clearance')->name('biz-clearance');
        });
        
        Route::name('templates.')->group(function(){
            Route::get('/business-clearance/{document}', [AdminController::class, 'bizClearanceTemplate'])->middleware('docs.document-type')->name('biz-clearance');
            Route::get('/barangay-clearance/{document}', [AdminController::class, 'brgyClearanceTemplate'])->middleware('docs.document-type')->name('brgy-clearance');
            Route::get('/indigency/{document}', [AdminController::class, 'indigencyTemplate'])->middleware('docs.document-type')->name('indigency');
        });

        Route::name('chat-support.')->group(function() {
            Route::view('/chat-support-tag', 'admin.admin-chat-support')->name('tag');
            Route::view('/chat-support-tag/{tag}', 'admin.admin-chat-support-conversation')->name('conversation');
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
        Route::view('/account', 'sub-admin.sub-admin-account')->name('account');

        Route::name('docs.')->group(function(){
            Route::view('/brgy-clearances', 'sub-admin.sub-admin-print-clearance')->name('brgy-clearances');
            Route::view('/biz-clearances', 'sub-admin.sub-admin-print-biz-permit')->name('biz-clearances');
            Route::get('/indigencies', [SubAdminController::class, 'indigency'])->name('indigencies');
        });

        Route::name('templates.')->group(function(){
            Route::get('/business-clearance/{document}', [SubAdminController::class, 'bizClearanceTemplate'])->middleware('docs.document-type')->name('biz-clearance');
            Route::get('/barangay-clearance/{document}', [SubAdminController::class, 'brgyClearanceTemplate'])->middleware('docs.document-type')->name('brgy-clearance');
            Route::get('/indigency/{document}', [SubAdminController::class, 'indigencyTemplate'])->middleware('docs.document-type')->name('indigency');
        });
    });
});
/*------------------------- End of Sub-Admin Routes -------------------------*/


/*------------------------- Start of BHW Routes -------------------------*/
Route::middleware(['sub-admin.auth:sub-admin', 'bhw:bhw'])->group(function() {
    Route::prefix('bhw')->name('bhw.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'BHWLogout'])->name('logout');
        Route::view('/dashboard', 'bhw.bhw-dashboard')->name('dashboard');
        Route::view('/family-profile', 'bhw.bhw-family-profiles')->name('family-profiles');
        Route::view('/patients', 'bhw.bhw-patients')->name('patients');
        Route::view('/health-records/{patient}', 'bhw.bhw-health-records')->name('health-records');
        Route::view('/programs', 'bhw.bhw-programs')->name('programs');
        Route::view('/account', 'bhw.bhw-account')->name('account');
        
        Route::name('manage.')->group(function () {
            Route::view('/resident-accounts', 'bhw.bhw-resident-accounts')->name('resident-accounts');
            Route::view('/bhw-accounts', 'bhw.bhw-bhw-accounts')->name('bhw-accounts');
        });

        Route::get('/generate-report/residents', [BHWController::class, 'generateReportResidents'])->name('generate-report.residents');
    });
});


Route::middleware(['bhw.auth:bhw', 'bhw.active'])->group(function() {
    Route::prefix('sub-bhw')->name('sub-bhw.')->group(function() {
        Route::post('/logout', [LogoutController::class, 'subBHWLogout'])->name('logout');
        Route::view('/dashboard', 'sub-bhw.sub-bhw-dashboard')->name('dashboard');
        Route::view('/resident-accounts', 'sub-bhw.sub-bhw-resident-accounts')->name('resident-accounts');
        Route::view('/family-profile', 'sub-bhw.sub-bhw-family-profiles')->name('family-profiles');
        Route::view('/account', 'sub-bhw.sub-bhw-account')->name('account');
    });
});
/*------------------------- End of BHW Routes -------------------------*/


/*------------------------- Start of Residents Routes -------------------------*/
Route::post('/login-validate', [LoginController::class, 'residentValidate'])->name('user.validate'); // residents/business login validation route

Route::view('/resident-otp-verification', 'auth.users.otp-verifications.resident-otp')->middleware('auth:web')->name('resident-verification-mobile.notice');

Route::middleware('auth:web', 'resident-mobile.verified', 'resident.approval', 'resident.active')->group(function() {
    Route::prefix('resident')->name('resident.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'residentLogout'])->name('logout');
        Route::get('/home', [ResidentController::class, 'home'])->name('home');
        Route::view('/services', 'resident.request-report')->name('services');
        Route::view('/profile', 'resident.resident-profile')->name('profile');

        Route::get('/place/{place}', [ResidentController::class, 'place'])->name('place');

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

        Route::get('/add-report', [ResidentController::class, 'addReport'])->name('add-report');
        Route::post('/report', [ResidentController::class, 'report'])->name('report');
        Route::get('/report/{report}', [ResidentController::class, 'viewReport'])->name('view.report');
        Route::patch('/update-report/{report}', [ResidentController::class, 'updateReport'])->name('update-report');

        Route::view('/request-assistance', 'resident.assistance.request-assistance')->name('request-assistance');
        Route::post('/assistance', [ResidentController::class, 'requestAssistance'])->name('assistance');
        Route::get('/assistance/{assistance}', [ResidentController::class, 'assistance'])->name('view.assist');
        Route::patch('/update/assistance/{assistance}', [ResidentController::class, 'updateAssist'])->name('update.assist');
        Route::delete('/delete/assistance/{id}', [ResidentController::class, 'deleteAssist'])->name('delete.assist');

        Route::view('/jobs', 'resident.resident-jobs')->name('jobs');
        Route::get('/job/{job}', [ResidentController::class, 'viewJob'])->name('view-job');

        Route::view('/family-profile', 'resident.resident-family-profile')->middleware('resident.fam-profile')->name('family-profile');
    });
});
/*------------------------- End of Residents Routes -------------------------*/


/*------------------------- Start of Business Routes -------------------------*/

Route::view('/company-otp-verification', 'auth.users.otp-verifications.company-otp')->middleware('auth:business')->name('company-verification-mobile.notice');

Route::middleware('business.auth:business', 'company-mobile.verified', 'company.approval', 'company.active')->group(function() {
    Route::prefix('business')->name('business.')->group(function(){

        Route::post('/logout', [LogoutController::class, 'businessLogout'])->name('logout');
        Route::view('/home', 'business.business-home')->name('home');
        Route::view('/services', 'business.business-services')->name('services');
        Route::view('/profile', 'business.business-profile')->name('profile');
        Route::view('/share-location', 'business.business-share-loc')->name('share.location');

        Route::view('/post-job', 'business.jobs.post-job')->name('post-job');
        Route::view('/view-job/{id}', 'business.jobs.view-job')->name('view-job');

        Route::view('/business-clearance', 'business.business-request-clearance')->name('biz-clearance');
        Route::post('/business-clearance', [BusinessController::class, 'storeBizClearance'])->name('validate.biz-clearance');

        Route::get('/edit/documents/{id}/{token}', [BusinessController::class, 'editDocs'])->name('edit.docs');
        Route::patch('/update/business-clearance/{id}', [BusinessController::class, 'updateBizClearance'])->name('update.biz-clearnce');

        Route::get('/qr-code/{token}', [BusinessController::class, 'showQr'])->name('qr-code');
    });
});
/*------------------------- End of Business Routes -------------------------*/