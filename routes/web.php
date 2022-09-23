<?php

use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\WebsiteInfoController;
use App\Http\Controllers\admin\Authentication;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\FinancingsController;
use App\Http\Controllers\admin\GoalsController;
use App\Http\Controllers\admin\MainGoalsController;
use App\Http\Controllers\admin\ProjectsController;
use App\Http\Controllers\admin\QuestionsController;
use App\Http\Controllers\admin\ReportsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VolunteeredsController;
use App\Http\Controllers\web\CompaniesPageController;
use App\Http\Controllers\web\AboutUsController;
use App\Http\Controllers\web\ContactUsPageController;
use App\Http\Controllers\web\HomePageController;
use App\Http\Controllers\web\LocationController;
use App\Http\Controllers\web\ManagersPageController;
use App\Http\Controllers\web\ReportsPageController;
use App\Http\Controllers\web\ServicesPageController;
use App\Http\Controllers\web\SuccessStoryController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    // Authentication Admin Controller
    Route::get('/login', [Authentication::class, 'showLogin'])->name('login');
    Route::post('/userlogin', [Authentication::class, 'userlogin'])->name('userlogin');
    Route::get('/register', [Authentication::class, 'showRegister'])->name('register');
    Route::post('/save_user', [Authentication::class, 'saveUser'])->name('save_user');
    Route::get('/logout', [Authentication::class, 'logout'])->name('logout');

    // Reset Password Controller
    Route::get('/resetPassword', [Authentication::class, 'showResetPassword'])->name('resetPassword');
    Route::post('/resetPasswordEmail', [Authentication::class, 'resetPassword'])->name('resetPasswordEmail');
    Route::get('/verify_password/{token}', [Authentication::class, 'formPassword'])->name('verify_password');
    Route::post('/new_password', [Authentication::class, 'newPassword'])->name('new_password');

    // Error 403
    Route::get('/403', function () {
        return view('web.403');
    })->name('403');

    Route::group(['middleware' => 'auth'], function () {

        // Route::group(['middleware' => ['role:super_admin']], function () {
            // Admin Manage Users
        Route::group(['middleware' => ['permission:all_dashboard']], function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/users', 'show')->name('users');
                Route::get('/active_user/{id}', 'activeUser')->name('active_user');
                Route::get('/delete_user/{id}', 'deleteUser')->name('delete_user');
                Route::post('/updatePermission', 'updatePermission')->name('updatePermission');
            });
        });

        Route::group(['middleware' => ['permission:manage_services|all_dashboard']], function () {
            // Admin Services Manage
            Route::controller(ServicesController::class)->group(function () {
                Route::get('/services', 'show')->name('services');
                Route::post('/add_service', 'add')->name('add_service');
                Route::post('/update_service/{id}', 'update')->name('update_service');
                Route::get('/active_service/{id}', 'active')->name('active_service');
                Route::get('/delete_service/{id}', 'delete')->name('delete_service');
            });

            // Admin Main Goals Manage
            Route::controller(MainGoalsController::class)->group(function () {
                Route::get('/main_goals/{id}', 'show')->name('main_goals');
                Route::post('/add_main_goal', 'add')->name('add_main_goal');
                Route::post('/update_main_goal/{id}', 'update')->name('update_main_goal');
                Route::get('/active_main_goal/{id}', 'active')->name('active_main_goal');
                Route::get('/delete_main_goal/{id}', 'delete')->name('delete_main_goal');
            });

            // Admin Goals Manage
            Route::controller(GoalsController::class)->group(function () {
                Route::get('/goals', 'show')->name('goals');
                Route::post('/add_goal', 'add')->name('add_goal');
                Route::post('/update_goal/{id}', 'update')->name('update_goal');
                Route::get('/active_goal/{id}', 'active')->name('active_goal');
                Route::get('/delete_goal/{id}', 'delete')->name('delete_goal');
            });

            // Admin financings Manage
            Route::controller(FinancingsController::class)->group(function () {
                Route::get('/financings', 'show')->name('financings');
                Route::post('/add_financing', 'add')->name('add_financing');
                Route::post('/update_financing/{id}', 'update')->name('update_financing');
                Route::get('/active_financing/{id}', 'active')->name('active_financing');
                Route::get('/delete_financing/{id}', 'delete')->name('delete_financing');
            });

            // Admin Volunteereds Manage
            Route::controller(VolunteeredsController::class)->group(function () {
                Route::get('/volunteereds', 'show')->name('volunteereds');
                Route::post('/add_volunteered', 'add')->name('add_volunteered');
                Route::post('/update_volunteered/{id}', 'update')->name('update_volunteered');
                Route::get('/active_volunteered/{id}', 'active')->name('active_volunteered');
                Route::get('/delete_volunteered/{id}', 'delete')->name('delete_volunteered');
            });

            // Admin Questions Manage
            Route::controller(QuestionsController::class)->group(function () {
                Route::get('/questions', 'show')->name('questions');
                Route::post('/add_question', 'add')->name('add_question');
                Route::post('/update_question/{id}', 'update')->name('update_question');
                Route::get('/active_question/{id}', 'active')->name('active_question');
                Route::get('/delete_question/{id}', 'delete')->name('delete_question');
            });

        });

        Route::group(['middleware' => ['permission:manage_content|all_dashboard']], function () {
            // Categorirs Admin Controller
            Route::get('/contact_us', [ContactUsController::class, 'show'])->name('contact_us');

            // Admin Projects Manage
            Route::controller(ProjectsController::class)->group(function () {
                Route::get('/projects', 'show')->name('projects');
                Route::post('/add_project', 'add')->name('add_project');
                Route::post('/update_project/{id}', 'update')->name('update_project');
                Route::get('/active_project/{id}', 'active')->name('active_project');
                Route::get('/delete_project/{id}', 'delete')->name('delete_project');
            });

            // Admin reports Manage
            Route::controller(ReportsController::class)->group(function () {
                Route::get('/reports',  'show')->name('reports');
                Route::post('/add_report',  'add')->name('add_report');
                Route::post('/update_report/{id}',  'update')->name('update_report');
                Route::get('/active_report/{id}',  'active')->name('active_report');
                Route::get('/delete_report/{id}',  'delete')->name('delete_report');
            });

            // admin Manage websiteInfo
            Route::get('/website/{id}', [WebsiteInfoController::class, 'website'])->name('website');
            Route::POST('/editwebsite/{id}', [WebsiteInfoController::class, 'editwebsite'])->name('editwebsite');
        });
    });
    Route::get('/home', [HomePageController::class, 'showHomePage'])->name('home');
    Route::get('/services_page/{id}', [ServicesPageController::class, 'show'])->name('services_page');
    Route::get('/about_us', [AboutUsController::class, 'show'])->name('about_us');
    Route::get('/success_story', [SuccessStoryController::class, 'showSuccessStoryPage'])->name('success_story');
    Route::get('/companies', [CompaniesPageController::class, 'showCompaniesPage'])->name('companies');
    Route::get('/reports_page', [ReportsPageController::class, 'show'])->name('reports_page');
    Route::get('/managers', [ManagersPageController::class, 'show'])->name('managers');
    Route::get('/contact_page', [ContactUsPageController::class, 'showContactUsPage'])->name('contact_page');
    Route::get('/fetchCountryPage', [LocationController::class, 'fetchCountry']);
});
