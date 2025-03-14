<?php

use App\Http\Controllers\Affiliate\{
    AffiliateAuth\LoginController as AffiliateLoginController,
    AffiliateAuth\ForgotPasswordController as AffiliateForgotPasswordController,
    AffiliateAuth\RegisterController as AffiliateRegisterController,
    AffiliateAuth\ResetPasswordController as AffiliateResetPasswordController,
    Dashboard\ClientsController as AffiliateClientsController,
    Dashboard\KYCController as AffiliateKYCController,
    Dashboard\ReferralsController as AffiliateReferralsController,
    Dashboard\WithdrawalsController as AffiliateWithdrawalsController,
    Dashboard\DashboardController as AffiliateDashboardController};

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Panel\{Auth\LoginController,
    Dashboard\DashboardController,
    Dashboard\Marketing\Affiliates\AffiliatesController,
    Dashboard\Marketing\Affiliates\KYCController,
    Dashboard\Marketing\Affiliates\WithdrawalsController,
    Dashboard\Marketing\Clients\ClientsController,
    Dashboard\Marketing\EstatesController,
    Dashboard\Marketing\Location\CityController,
    Dashboard\Marketing\Location\StateController,
    Dashboard\Marketing\Location\StatesController,
    Dashboard\Settings\ProfileController,
    Dashboard\Settings\SettingsController,
    Dashboard\Settings\AccountsController,
    Dashboard\Settings\LegalsController,
    Dashboard\Website\BrandsController,
    Dashboard\Website\FaqsController,
    Dashboard\Website\ProjectController,
    Dashboard\Website\TeamController,
    Dashboard\Website\TestimonialsController};

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

Route::get('/', [WebsiteController::class, 'index'])->name('welcome');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/faqs', [WebsiteController::class, 'faqs'])->name('faqs');
Route::get('/testimonials', [WebsiteController::class, 'testimonials'])->name('testimonials');
Route::get('/realtors', [WebsiteController::class, 'realtors'])->name('realtors');
Route::get('/inspections', [WebsiteController::class, 'inspections'])->name('inspections');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [WebsiteController::class, 'contact_send'])->name('contact.send');
Route::get('/projects', [WebsiteController::class, 'projects'])->name('projects');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');

Route::get('/become-an-affiliate', [WebsiteController::class, 'affiliates']);
Route::get('/inspections', [WebsiteController::class, 'inspections']);
Route::post('/inspections/save', [WebsiteController::class, 'book_inspection'])->name('inspections.save');

Route::get('gizmo/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::namespace('Panel')->group(function() {
    Route::group(['prefix' => 'panel', 'as' => 'panel.', ], function(){

        Route::namespace('Auth')->group(function() {
            Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [LoginController::class, 'login'])->name('login.post');
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        });

        Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:web', 'namespace' => 'Dashboard'], function(){

            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            /** Settings Routes */
            Route::group(['prefix' => 'settings', 'as' => 'settings.', 'namespace' => 'Settings'], function(){

                /** Profile Routes */
                Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
                    Route::get('/', [ProfileController::class, 'index'])->name('manage');
                    Route::post('/update', [ProfileController::class, 'update'])->name('update');
                    Route::post('/password', [ProfileController::class, 'password'])->name('password');
                });

                /** Settings Routes */
                Route::get('/manage', [SettingsController::class, 'index'])->name('manage');
                Route::post('/manage', [SettingsController::class, 'save'])->name('save');

                //Bank Account Routes
                Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function(){
                    Route::post('/save', [AccountsController::class, 'save'])->name('save');
                    Route::post('/update', [AccountsController::class, 'update'])->name('update');
                    Route::post('/delete', [AccountsController::class, 'delete'])->name('delete');
                });

                /** Legal Notices Routes */
                Route::group(['prefix' => 'legals', 'as' => 'legals.'], function(){
                    Route::get('/', [LegalsController::class, 'index'])->name('manage');
                    Route::post('/upload', [LegalsController::class, 'upload'])->name('upload');
                    Route::post('/delete', [LegalsController::class, 'delete'])->name('delete');
                });

            });

            /** Website Elements Routes */
            Route::group(['prefix' => 'website', 'namespace' => 'Website', 'as' => 'website.'], function(){

                Route::get('/', [DashboardController::class, 'website'])->name('manage');

                /** Testimonials Routes */
                Route::group(['prefix' => 'testimonials', 'as' => 'testimonials.'], function(){
                    Route::get('/', [TestimonialsController::class, 'index'])->name('manage');
                    Route::post('/save', [TestimonialsController::class, 'save'])->name('save');
                    Route::post('/update', [TestimonialsController::class, 'update'])->name('update');
                    Route::post('/delete', [TestimonialsController::class, 'delete'])->name('delete');
                });

                /** FAQs Routes */
                Route::group(['prefix' => 'faqs', 'as' => 'faqs.'], function(){
                    Route::get('/', [FaqsController::class, 'index'])->name('manage');
                    Route::post('/save', [FaqsController::class, 'save'])->name('save');
                    Route::post('/update', [FaqsController::class, 'update'])->name('update');
                    Route::post('/delete', [FaqsController::class, 'delete'])->name('delete');
                });

                /** Team Routes */
                Route::group(['prefix' => 'team', 'as' => 'team.'], function(){
                    Route::get('/', [TeamController::class, 'index'])->name('manage');
                    Route::post('/save', [TeamController::class, 'save'])->name('save');
                    Route::post('/update', [TeamController::class, 'update'])->name('update');
                    Route::post('/delete', [TeamController::class, 'delete'])->name('delete');
                });

                /** Brand Routes */
                Route::group(['prefix' => 'brands', 'as' => 'brands.'], function(){
                    Route::get('/', [BrandsController::class, 'index'])->name('manage');
                    Route::post('/save', [BrandsController::class, 'save'])->name('save');
                    Route::post('/update', [BrandsController::class, 'update'])->name('update');
                    Route::post('/delete', [BrandsController::class, 'delete'])->name('delete');
                });

                /** Projects Routes */
                Route::group(['prefix' => 'projects', 'as' => 'projects.'], function(){
                    Route::get('/', [ProjectController::class, 'index'])->name('manage');
                    Route::post('/save', [ProjectController::class, 'save'])->name('save');
                    Route::post('/update', [ProjectController::class, 'update'])->name('update');
                    Route::post('/delete', [ProjectController::class, 'delete'])->name('delete');
                });
            });

            /** Affiliates Routes */
            Route::group(['namespace' => 'Marketing', 'as' => 'marketing.', 'prefix' => 'marketing'], function() {
                Route::namespace('Affiliates')->group(function() {
                    Route::group(['prefix' => 'affiliates'], function() {
                        Route::get('/', [AffiliatesController::class, 'index'])->name('affiliates');
                        Route::get('/paid', [AffiliatesController::class, 'paid'])->name('affiliates.paid');
                        Route::post('/approve', [AffiliatesController::class, 'approve'])->name('affiliates.approve');
                        Route::post('/register', [AffiliatesController::class, 'register'])->name('affiliates.register');
                        Route::post('/update', [AffiliatesController::class, 'update'])->name('affiliates.update');
                        Route::post('/disapprove', [AffiliatesController::class, 'disapprove'])->name('affiliates.disapprove');
                        Route::post('/delete', [AffiliatesController::class, 'delete'])->name('affiliates.delete');
                        Route::post('/suspend', [AffiliatesController::class, 'suspend'])->name('affiliates.suspend');
                        Route::post('/restore', [AffiliatesController::class, 'restore'])->name('affiliates.restore');
                        Route::get('/view/{code}', [AffiliatesController::class, 'view'])->name('affiliates.view');
                    });

                    //Withdrawals Routes
                    Route::group(['prefix' => 'withdrawals', 'as' => 'affiliates.withdrawals.'], function(){
                        Route::get('/', [WithdrawalsController::class, 'index'])->name('manage');
                        Route::post('/approve', [WithdrawalsController::class, 'approve'])->name('approve');
                        Route::post('/delete', [WithdrawalsController::class, 'delete'])->name('delete');
                    });

                    //Withdrawals Routes
                    Route::group(['prefix' => 'kyc', 'as' => 'affiliates.kyc.'], function(){
                        Route::get('/', [KYCController::class, 'index'])->name('manage');
                        Route::post('/view/kyc/approve', [KYCController::class, 'approve'])->name('approve');
                        Route::post('/view/kyc/delete', [KYCController::class, 'delete'])->name('delete');
                    });
                });

                /** Estates Routes */
                Route::group(['prefix' => 'estates', 'as' => 'estates.'], function(){
                    Route::get('/', [EstatesController::class, 'index'])->name('manage');
                    Route::post('/save', [EstatesController::class, 'save'])->name('save');
                    Route::post('/update', [EstatesController::class, 'update'])->name('update');
                    Route::post('/delete', [EstatesController::class, 'delete'])->name('delete');
                    Route::get('/view/{estate}', [EstatesController::class, 'view'])->name('view');
                });

                /** Clients Routes */
                Route::namespace('Clients')->group(function() {
                    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function(){
                        Route::get('/', [ClientsController::class, 'index'])->name('manage');
                        Route::get('/register', [ClientsController::class, 'register'])->name('register');
                        Route::post('/save', [ClientsController::class, 'save'])->name('save');
                        Route::post('/delete', [ClientsController::class, 'delete'])->name('delete');
                        Route::post('/update', [ClientsController::class, 'update'])->name('update');
                        Route::post('/restore', [ClientsController::class, 'restore'])->name('restore');
                        Route::post('/suspend', [ClientsController::class, 'suspend'])->name('suspend');
                        Route::get('/view/{code}', [ClientsController::class, 'client'])->name('view');
                        Route::get('/edit/{code}', [ClientsController::class, 'edit'])->name('edit');

                    });
                });

                /** Location Routes */
                Route::namespace('Location')->group(function(){
                    Route::group(['prefix' => 'locations', 'as' => 'locations.'], function(){

                        Route::get('/', [StatesController::class, 'index'])->name('manage');

                        /** State Routes */
                        Route::group(['prefix' => 'state', 'as' => 'state.'], function(){
                            Route::get('/view/{state}', [StateController::class, 'view'])->name('view');
                            Route::get('/estates/{state}', [StateController::class, 'estates'])->name('estates');
                            Route::get('/realtors/{state}', [StateController::class, 'realtors'])->name('realtors');
                            Route::get('/sales/{state}', [StateController::class, 'sales'])->name('sales');

                            /** City Routes */
                            Route::group(['prefix' => 'city', 'as' => 'city.'], function(){
                                Route::post('/save', [CityController::class, 'save'])->name('save');
                            });
                        });

                    });
                });

                /** Sales Routes */
                Route::namespace('Sales')->group(function() {
                    Route::group(['prefix' => 'sales'], function(){
                        Route::get('/', 'SalesController@index')->name('sales');
                        Route::get('/receipt/{code}', 'SalesController@receipt')->name('sale.receipt');
                    });
                });
            });

            /** Inspection Routes */
            Route::group(['prefix' => 'inspections'], function(){
                Route::get('/', 'InspectionsController@index')->name('inspections');
                Route::post('/approve', 'InspectionsController@approve')->name('inspection.approve');
                Route::post('/delete', 'InspectionsController@delete')->name('inspection.delete');
            });

        });
    });
});

Route::namespace('Affiliate')->group(function() {
    Route::group(['prefix' => 'affiliate', 'as' => 'affiliate.'], function(){

        Route::namespace('AffiliateAuth')->group(function() {
            Route::get('login', [AffiliateLoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [AffiliateLoginController::class, 'login'])->name('login.post');
            Route::get('logout', [AffiliateLoginController::class, 'logout'])->name('logout');

            Route::get('/register', [AffiliateRegisterController::class, 'showRegistrationForm'])->name('register');
            Route::post('/register', [AffiliateRegisterController::class, 'register'])->name('register.post');

            Route::post('/password/email', [AffiliateForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.request');
            Route::post('/password/reset', [AffiliateResetPasswordController::class, 'reset'])->name('password.update');
            Route::get('/password/reset', [AffiliateForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
            Route::get('/password/reset/{token}', [AffiliateResetPasswordController::class, 'showResetForm'])->name('password.change');
        });

        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){
            Route::group(['middleware' => 'auth:affiliate', 'namespace' => 'Dashboard'], function(){

                Route::get('/', [AffiliateDashboardController::class, 'index'])->name('manage');
                Route::post('/subscribe', [AffiliateDashboardController::class, 'subscribe'])->name('subscribe');
                Route::get('/profile', [AffiliateDashboardController::class, 'profile'])->name('profile');
                Route::post('/profile/update', [AffiliateDashboardController::class, 'update'])->name('profile.update');
                Route::post('/profile/password', [AffiliateDashboardController::class, 'password'])->name('profile.password');
                Route::post('/profile/avatar', [AffiliateDashboardController::class, 'avatar'])->name('profile.avatar');

                /** KYC Routes */
                Route::group(['prefix' => 'kyc', 'as' => 'kyc.'], function() {
                    Route::get('/', [AffiliateKYCController::class, 'index'])->name('manage');
                    Route::post('/update', [AffiliateKYCController::class, 'update'])->name('update');
                });

                /** Referrals Routes */
                Route::group(['prefix' => 'referrals', 'as' => 'referrals.'], function() {
                    Route::get('/', [AffiliateReferralsController::class, 'index'])->name('manage');
                });

                /** Clients Routes */
                Route::group(['prefix' => 'clients', 'as' => 'clients.'], function() {
                    Route::get('/', [AffiliateClientsController::class, 'index'])->name('manage');
                    Route::get('/register', [AffiliateClientsController::class, 'register'])->name('register');
                    Route::post('/register', [AffiliateClientsController::class, 'save'])->name('save');
                    Route::get('/view/{client}', [AffiliateClientsController::class, 'view'])->name('view');
                });

                /** Withdrawals Routes */
                Route::group(['prefix' => 'withdrawals', 'as' => 'withdrawals.'], function() {
                    Route::get('/', [AffiliateWithdrawalsController::class, 'index'])->name('manage');
                    Route::post('/account', [AffiliateWithdrawalsController::class, 'account'])->name('account');
                    Route::post('/send', [AffiliateWithdrawalsController::class, 'send'])->name('send');
                });

            });
        });

    });
});

