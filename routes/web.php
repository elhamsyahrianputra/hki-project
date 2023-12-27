<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\Applicant\BrandController as ApplicantBrandController;

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

Route::get('/', [LandingPageController::class, 'home'])->name('home');
Route::get('/search', [LandingPageController::class, 'search'])->name('search');
Route::get('/brand/detail/{brand:id}', [LandingPageController::class, 'detail'])->name('detail');
Route::get('/announcements', [LandingPageController::class, 'announcements']);
Route::get('/announcements/{announcement:slug}', [LandingPageController::class, 'announcement']);
 
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::post('/get-pdki', function(Request $request) {
        $dataPDKI = new BrandController();
    
        $data = $dataPDKI->getsimilarityData($request->input('inputText'));
    
        return $data;
    });

    // * Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
        route::resource('brands', BrandController::class)->only(['index', 'show', 'update', 'destroy']);
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
        route::resource('users', UserController::class);
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
        route::resource('announcements', AnnouncementController::class);
    });

    // * Applicant
    Route::group(['prefix' => 'applicant', 'as' => 'applicant.'], function() {
        Route::resource('brands', ApplicantBrandController::class);
    });

    // * Settings
    Route::group(['prefix' => 'settings'], function() {
        Route::get('profile', [ProfileController::class, 'profile'])->name('settings.profile');
            Route::put('profile/upload-image', [ProfileController::class, 'uploadImage'])->name('profile.upload_image');
            Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::get('account', [ProfileController::class, 'account'])->name('settings.account'); 
        });

});

Auth::routes(['verify' => true]);
require __DIR__.'/auth.php';

Auth::routes();
