<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminContactUsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminItemController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ItemController;
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

Route::view('/', 'front.landing')->name('landing');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/ckeditor/upload', [FileUploadController::class, 'upload'])->name('ckeditor.upload');

Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('', [CategoryController::class, 'index'])->name('index');
    Route::get('{category}', [CategoryController::class, 'show'])->name('show');
});

Route::prefix('items')->name('items.')->group(function () {
    Route::get('', [ItemController::class, 'index'])->name('index');
    Route::get('{item}', [ItemController::class, 'show'])->name('show');
});

Route::post('comments/{item}', [CommentController::class, 'store'])->name('comments.store');
Route::get('contact-us',[ContactUsController::class, 'index'])->name('contact-us.index');
Route::post('contact-us',[ContactUsController::class, 'store'])->name('contact-us.store');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('',[AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);
    Route::resource('categories',AdminCategoryController::class);
    Route::resource('items',AdminItemController::class);

    Route::get('comments', [AdminCommentController::class, 'index'])->name('comments.index');
    Route::patch('comments/{comment}/approve', [AdminCommentController::class, 'approve'])->name('comments.approve');
    Route::patch('comments/{comment}/disapprove', [AdminCommentController::class, 'disapprove'])->name('comments.disapprove');
    Route::delete('comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('contact-us', [AdminContactUsController::class, 'index'])->name('contact-us.index');
    Route::delete('contact-us/{contactUs}', [AdminContactUsController::class, 'destroy'])->name('contact-us.destroy');

});
