<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function (){
    Route::post('login','login');
    Route::post('register','register');
    Route::post('resetPassword','resetPassword');
    Route::post('confirmEmail','confirmEmail');
    Route::post('changePassword','changePassword');
});


Route::middleware(['auth:sanctum','role:user'])->group(function (){
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::controller(ProductController::class)->group(function (){
        Route::get('getAllProducts','getAllProducts');
        Route::get('getFeaturedProducts','getFeaturedProducts');
        Route::get('getProductsByCategoryId/{categoryID}','getProductsByCategoryId');
        Route::get('getProductById/{productID}','getProductById');
    });

    Route::controller(CategoryController::class)->group(function (){
        Route::get('getAllCategories','getAllCategories');
        Route::get('getCategoryById/{categoryID}','getCategoryById');
    });

    Route::controller(ReviewController::class)->group(function (){
        Route::post('makeReview','makeReview');
        Route::get('getProductReviews/{productID}','getProductReviews');
    });

    Route::controller(OrderController::class)->group(function (){
        Route::post('makeOrder','makeOrder');
        Route::post('checkOut','checkOut');
        Route::post('applyCoupon','applyCoupon');
        Route::get('getAllOrders','getAllOrders');
        Route::get('getSpecificOrder/{orderID}','getSpecificOrder');
        Route::get('getOrderBasedOnStatus/{status}','getOrderBasedOnStatus');
        Route::get('getOrderBasedOnType/{type}','getOrderBasedOnType');
    });

    Route::controller(GeneralController::class)->group(function (){
        Route::get('getAllCoupons','getAllCoupons');
    });
});

