<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\AllUsersController;
use \App\Http\Controllers\Admin\AboutusController;
use \App\Http\Controllers\Admin\PrivacyPolicyController;
use \App\Http\Controllers\Admin\FaqController;

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
    return view('welcome');
});









Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
//    Route::get('admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
//    Route::post('admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('update.password');


    Route::controller(AllUsersController::class)->group(function (){
        Route::get('all/user','AllUser')->name('all-user');

    });







    //All User controller ---------------------------

    Route::controller(AllUsersController::class)->group(function (){
        Route::get('normal/user','NormalUser')->name('normal.user');
        Route::get('premium/user','PremiumUser')->name('premium.user');


        Route::get('normal/user/details/{id}','NormalUserDetails')->name('normal.User.details');
        Route::put('premium/user/approve','PremiumUserApprove')->name('premium.user.approve');
        Route::get('premium/user/details/{id}','PremiumUserDetails')->name('premium.User.details');
        Route::put('normal/user/approve','NormalUserApprove')->name('normal.user.approve');

    });





    //All About Us controller ---------------------------


    Route::controller(AboutusController::class)->group(function (){
        Route::get('all/about-us','AllAboutus')->name('about.us');
        Route::get('add/about-us','AddAboutus')->name('add.aboutus');
        Route::post('store/about-us','StoreAboutus')->name('store.aboutus');
        Route::get('edit/about-us/{id}','EditAboutus')->name('edit.aboutus');
        Route::post('update/about-us','UpdateAboutus')->name('update.aboutus');
        Route::delete('delete/about/{id}','DeleteAboutus')->name('delete.aboutus');




    });




    //All privacy controller ---------------------------



    Route::controller(PrivacyPolicyController::class)->group(function (){
        Route::get('all/privacy','AllPrivacy')->name('privacy.policy');
        Route::get('add/privacy','AddPrivacy')->name('add.privacy');
        Route::post('store/privacy','StorePrivacy')->name('store.privacy');
        Route::get('edit/privacy/{id}','EditPrivacy')->name('edit.privacy');
        Route::post('update/privacy','UpdatePrivacy')->name('update.privacy');
        Route::delete('delete/privacy/{id}','DeletePrivacy')->name('delete.privacy');


    });



    //All Faq controller ---------------------------

    Route::controller(FaqController::class)->group(function (){
        Route::get('all/faq','AllFaq')->name('all.faq');
        Route::get('add/faq','AddFaq')->name('add.faq');
        Route::post('store/faq','StoreFaq')->name('store.faq');
        Route::get('edit/faq/{id}','EditFaq')->name('edit.faq');
        Route::post('update/faq','UpdateFaq')->name('update.faq');
        Route::delete('delete/faq/{id}','DeleteFaq')->name('delete.faq');


    });


});


Route::get('admin/login',[AdminController::class,'AdminLogin']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
