<?php

use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\api\CitiesController;
use App\Http\Controllers\api\ContactUsController;
use App\Http\Controllers\api\CountriesController;
use App\Http\Controllers\api\ServicesController;
use App\Http\Controllers\api\ServicesPointController;
use App\Http\Controllers\api\SubCategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth'], function () {

    // Route::group(['middleware' => ['permission:manage_services|all_dashboard']], function () {

        Route::controller(ContactUsController::class)->group(function () {
            Route::get('/fetch_contact_us', 'show')->name('fetch_contact_us');
            Route::post('/add_contact_us', 'store')->name('add_contact_us');
            Route::get('/edit_contact_us/{id}', 'edit')->name('edit_contact_us');
            Route::put('/update_contact_us/{id}', 'update')->name('update_contact_us');
            Route::get('/active_contact_us/{id}', 'status')->name('active_contact_us');
            Route::get('/delete_contact_us/{id}', 'delete')->name('delete_contact_us');
        });

    // });
// });
