<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\UserController;
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
Route::prefix('admin')->name('admin.')->group(function () {

    ### Start Login Admin Route ###
    Route::group(['prefix' => 'auth'], function () {

        Route::get('login', [LoginController::class, 'getLogin'])->name('get.login');

        Route::post('login', [LoginController::class, 'login'])->name('login');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');


    });
    ### End Login Admin Route ###


    ### Start Auth Admin Route ###
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');

        ### Start Profile Routes ###
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
            Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
            Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
        });
        ### End Profile Routes ###

        ### Start Users Routes ###
        Route::resource('users', UserController::class);
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
        });
        ### End Users Routes ###


        ### Start sliders Routes ###
        Route::resource('sliders', SliderController::class);
        Route::prefix('sliders')->name('sliders.')->group(function () {
            Route::get('/update/status/{slider_id}/{status}', [SliderController::class, 'updateStatus'])->name('status');
        });
        ### End sliders Routes ###

        ### Start Categories Routes ###
        Route::resource('categories', CategoryController::class);
        ### End Categories Routes ###

        ### Start Contacts Routes ###
        Route::resource('contacts', ContactController::class)->only('index');
        ### End Contacts Routes ###

        ### Start Subscribers Routes ###
        Route::resource('subscribers', SubscriberController::class)->only('index');
        ### End Subscribers Routes ###

        ### Start Partners Routes ###
        Route::get('partners', [PartnerController::class,'edit'])->name('partners.index');
        Route::post('partners/update', [PartnerController::class,'update'])->name('partners.update');
        ### End Partners Routes ###

        ### Start Counters Routes ###
        Route::get('counters', [CounterController::class,'edit'])->name('counters.index');
        Route::post('counters/update', [CounterController::class,'update'])->name('counters.update');
        ### End Counters Routes ###

        ### Start settings Routes ###
        Route::get('settings', [SettingController::class, 'general'])->name('settings.index');
        Route::post('settings/updateSettings', [SettingController::class, 'updateSettings'])->name('settings.updateSettings');
        ### End settings Routes ###

        ### Start notifications Routes ###
        Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
        ### End notifications Routes ###

    });
    ### End Auth Admin Route ###

});
