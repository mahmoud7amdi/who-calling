<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController ;
use App\Http\Controllers\FindLocationController ;
use App\Http\Controllers\SearchController ;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AboutUSController;

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

Route::group(['middleware' => ['auth:sanctum','role:user']],function() {
    Route::get('profile', [UserController::class, 'profile']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::put('updateProfile',[UserController::class,'UpdateProfile']);
    Route::post('search',[SearchController::class,'Search']);
    Route::get('find-near-users/{distance}', [FindLocationController::class,'nearUsers']);



});

Route::group(['middleware' => ['auth:sanctum','role:admin','localization']],function() {
    Route::get('privacy-Policy',[PrivacyPolicyController::class,'index']);
    Route::get('about-us',[AboutUSController::class,'index']);
    Route::get('faq',[FaqController::class,'index']);
});


Route::group(['middleware' => ['auth:sanctum','role:admin','localization']],function() {

    // About Us Route

    Route::controller(AboutUSController::class)->group(function (){
        Route::post('about-us','store');
        Route::get('about-us/{id}','show');
        Route::put('about-us/{id}','update');
        Route::delete('about-us/{id}','destroy');
    });

    //   Faq Route

    Route::controller(FaqController::class)->group(function (){
        Route::post('faq','store');
        Route::get('faq/{id}','show');
        Route::put('faq/{id}','update');
        Route::delete('faq/{id}','destroy');
    });

    // privacy-Policy Route

    Route::controller(PrivacyPolicyController::class)->group(function (){
        Route::post('privacy-Policy','store');
        Route::get('privacy-Policy/{id}','show');
        Route::put('privacy-Policy/{id}','update');
        Route::delete('privacy-Policy/{id}','destroy');
    });


});

Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
