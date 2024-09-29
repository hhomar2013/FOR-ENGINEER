<?php

use App\Mail\CompanyMail;
use App\Http\Livewire\Spa;
use App\Http\Controllers\Paytab;
use App\Http\Livewire\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\paymobController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MoyasarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Sitev2\AboutComponent;
use App\Http\Livewire\Sitev2\BlogComponent;
use App\Http\Livewire\Sitev2\LandingPage;
use App\Http\Livewire\Sitev2\ServiceComponent;
use App\Http\Livewire\Sitev2\User\NewRequestComponent;
use App\Http\Livewire\Sitev2\User\ShowNewRequest;
use App\Http\Livewire\Sitev2\User\UserDashboardComponent;
use App\Http\Livewire\Sitev2\UserProfileComponent;
use Illuminate\Support\Facades\Artisan;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|This File Deployment From Omar Mahgoub Web Developer
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/clear-cache', function() {
            $exitCode = Artisan::call('optimize:clear');
            // return what you want
        });

        // Route::get('/storage-link', function () {
        //     $exitCode = Artisan::call('storage:link', [] );
        //     echo $exitCode;
        // });

        Route::get('/storage-unlink', function () {
            Artisan::call('storage:unlink');
        });
        Route::get('/storage-link',function ()
        {$targetFolder = storage_path('app/public');$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';symlink($targetFolder,$linkFolder);});


        //        Route::get('/', function () {return view('welcome');});
        // Route::get('/',[HomeController::class,'index_customer'])->name('site.index');
        Route::get('/', LandingPage::class)->name('site.index');
        Route::get('/blog', BlogComponent::class)->name('site.blog');
        Route::get('/about',AboutComponent::class)->name('site.about');
        Route::get('/contact',[HomeController::class,'contact'])->name('site.contact');
        // Route::get('/service/show/{id}',[HomeController::class,'SeriveShow'])->name('site.service.show');
        Route::get('/service/show/{id}', ServiceComponent::class)->name('site.service.show');
//        Auth::routes(['verify'=>true]);
        Auth::routes();
        Route::get('/cp',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
        Route::post('/cp',[LoginController::class,'adminLogin'])->name('admin.login');
        Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
        Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

        Route::get('/company',[LoginController::class,'showCompanyLogin'])->name('company.login-view');
        Route::post('/company',[LoginController::class,'companyLogin'])->name('company.login');


    /*When Clint Login*/

        // Route::get('/serviceProvider',[siteController::class,'service_provider'])->name('service_provider');
        Route::get('/serviceProvider',Services::class)->name('service_provider');

        /*Super Admin Routs*/
    Route::group(['middleware' => ['auth:admin']], function() {

        Route::get('/admin/dashboard',Dashboard::class)->name('super.dashboard');
        // Route::get('/admin/dashboard',[AdminController::class,'index'])->name('super.dashboard');
        /*SPA*/
        Route::get('/admin/Orders',[AdminController::class,'Orders'])->name('admin.Orders');
        Route::get('/admin/spa',[AdminController::class,'spa'])->name('admin.spa');
        Route::get('/admin/ContactMessageList',[AdminController::class,'ContactMessageList'])->name('admin.ContactMessageList');
        Route::get('/admin/spaActions/{id}/{action}',[Spa::class,'spa_action'])->name('admin.spa_action');
        Route::get('/admin/company-types',[AdminController::class,'company_type'])->name('admin.ct');
        Route::get('/admin/categories',[AdminController::class,'categories'])->name('admin.categories');
        Route::get('/admin/CareersType',[AdminController::class,'CareersType'])->name('admin.CareersType');
        Route::get('/admin/service-price',[AdminController::class,'service_price'])->name('admin.service-price');
        Route::get('/admin/notifications',[AdminController::class,'notifications'])->name('admin.notifications');
        Route::get('/admin/CareerRequest',[AdminController::class,'CareerRequest'])->name('admin.CareerRequest');
        Route::get('/admin/companiesAccountant',[AdminController::class,'companiesAccountant'])->name('admin.companiesAccountant');

        Route::get('/admin/profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('/admin/users',[AdminController::class,'admin_user'])->name('admin.users');
//        Route::resource('roles', RoleController::class);
        Route::get('/payments/{id}',[AdminController::class,'payments'])->name('admin.payments');
        Route::get('/refund/{id}',[AdminController::class,'refund'])->name('admin.refund');
    });
        /*End of Super Admin Routs*/

        /*Company Routs*/
        Route::group(['middleware' => ['auth:company']],function (){
            Route::get('/company/dashboard',[CompanyController::class,'index'])->name('admin.dashboard');
            Route::get('/company/profile',[CompanyController::class,'profile'])->name('company.profile');
            Route::get('/company/services',[CompanyController::class,'services'])->name('company.services');
            Route::get('/company/orders',[CompanyController::class,'company_order'])->name('company.orders');
        });
        /*End Company Routs*/




        /*Clint Routes*/
        Route::group(['middleware' => ['auth:web']],function (){
            // Route::get('/site',[HomeController::class,'index'])->name('site.home');
            Route::get('/orders/{id}',[HomeController::class,'orders'])->name('site.orders');
            Route::get('/YourOrders',[HomeController::class,'UserOrders'])->name('site.user_orders');
            Route::get('/careers',[HomeController::class,'careers'])->name('site.careers');

            Route::get('moyasar',[MoyasarController::class,'index']);
            Route::get('pay/{amount}/{id}/',[MoyasarController::class,'pay'])->name('pay');
            Route::get('pay_invoice/{amount}/{id}/',[MoyasarController::class,'payInvoice'])->name('payInvoice');
            Route::get('free_pay/{id}',[MoyasarController::class,'free_pay'])->name('free_pay');
            Route::get('call_back',[MoyasarController::class,'call_back'])->name('call_back');
            Route::get('call_back_invoice',[MoyasarController::class,'call_back_invoice'])->name('call_back_invoice');


            Route::get('/user/profile',[HomeController::class,'users_profile'])->name('clint.profile');
            Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');

            Route::post('/user/logout',[LoginController::class,'logout_user'])->name('user.logout');

            /*-----------------------------------------------------------------------------------*/
            Route::get('/Dashboard',UserDashboardComponent::class)->name('user.dashboard');
            Route::get('/request/{id}',NewRequestComponent::class)->name('user.request');
            Route::get('/showRequest/{id}',ShowNewRequest::class)->name('user.show.request');
        });
        /*End Clint Routes*/



        Route::get('paymob',[paymobController::class,'create']);
        Route::get('paytab',[Paytab::class,'create']);


        Route::get('create-transaction',    [PayPalController::class, 'createTransaction'])->name('createTransaction');
        Route::get('process-transaction',   [PayPalController::class, 'processTransaction'])->name('processTransaction');
        Route::get('success-transaction',   [PayPalController::class, 'successTransaction'])->name('successTransaction');
        Route::get('cancel-transaction',    [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');


        // Route::get('emailshow',[HomeController::class,'emailshow'])->name('emailshow');


    });//end of localization









