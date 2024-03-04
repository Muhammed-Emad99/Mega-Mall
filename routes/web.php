<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CountryStateCityController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return redirect()->route('admin.loginForm');
});


Route::prefix('/admin')->name('admin.')->group(function () {
    Route::controller(AuthController::class)->middleware('guest')->group(function () {
        Route::get('/loginForm', 'loginForm')->name('loginForm');
        Route::post('/login', 'login')->name('login');
        Route::get('/resetPasswordForm', 'resetPasswordForm')->name('resetPasswordForm');
        Route::post('/resetPassword', 'resetPassword')->name('resetPassword');
        Route::get('/confirmEmailForm', 'confirmEmailForm')->name('confirmEmailForm');
        Route::post('/confirmEmail', 'confirmEmail')->name('confirmEmail');
        Route::get('/changePasswordForm', 'changePasswordForm')->name('changePasswordForm');
        Route::post('/changePassword', 'changePassword')->name('changePassword');
    });

    Route::middleware('auth')->group(function () {

        ////////////////////////////////////////////////// super admin /////////////////////////////////////////////////
        Route::middleware('role:super-admin')->group(function () {
            Route::resource('/permissions', PermissionController::class)->names('permissions')->except('index', 'show');
            Route::resource('/roles', RoleController::class)->names('roles')->except('index', 'show');
        });

        ///////////////////////////////////////////////////// admin ////////////////////////////////////////////////////
        Route::middleware(['role:super-admin|admin'])->group(function () {
            Route::get('/home/index', [HomeController::class, 'index'])->name('home.index');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('/states/index/{id}', [CountryStateCityController::class, 'getStates'])->name('states.index');
            Route::get('/cities/index/{id}', [CountryStateCityController::class, 'getCities'])->name('cities.index');

            Route::resource('/permissions', PermissionController::class)->names('permissions')->only('index');
            Route::resource('/roles', RoleController::class)->names('roles')->only('index', 'show');
            Route::resource('/users', UserController::class)->names('users')->except('show');
            Route::resource('/profiles', ProfileController::class)->names('profiles')->only('show','update');
            Route::put('/profiles/updatePassword/{id}', [ProfileController::class, 'updatePassword'])->name('profiles.updatePassword');
            Route::resource('/categories', CategoryController::class)->names('categories');
            Route::resource('/products', ProductController::class)->names('products');
            Route::resource('/orders', CategoryController::class)->names('orders');
            Route::resource('/coupons', CategoryController::class)->names('coupons')->except('show');


        });
    });

});


