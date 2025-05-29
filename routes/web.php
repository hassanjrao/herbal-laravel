<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false, // Disable registration routes
    'reset' => false, // Disable password reset routes
    'verify' => false, // Disable email verification routes
]);

Route::view('/', 'front.landing');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/ckeditor/upload', [FileUploadController::class, 'upload'])->name('ckeditor.upload');


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('',[AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);

    Route::resource('categories',AdminCategoryController::class);


});
