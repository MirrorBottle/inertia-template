<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController as WebContactController;

// Dashboard
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\HomeController as HomePageController;
use App\Http\Controllers\SettingController;


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('page')->name('page.')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('/create', [PageController::class, 'create'])->name('create');
        Route::post('/', [PageController::class, 'store'])->name('store');
        Route::get('/{page}/edit', [PageController::class, 'edit'])->name('edit');
        Route::put('/{page}', [PageController::class, 'update'])->name('update');
        Route::put('/{page}/publish', [PageController::class, 'publish'])->name('publish');
        Route::delete('/{page}', [PageController::class, 'destroy'])->name('destroy');
        //Route::post('/upload', [BlogController::class, 'upload'])->name('upload');
    });
    Route::post('/upload/image', [HomePageController::class, 'uploadImage']);
    Route::post('/upload/video', [HomePageController::class, 'uploadVideo']);
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
    Route::resource('users', UserController::class);
    Route::resource('settings', SettingController::class)->only(['index', 'store']);
    Route::put('contacts/read/{id}', [ContactController::class, 'read'])->name('contacts.read');
    Route::resource('contacts', ContactController::class);
    Route::delete('menus/{type}/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::resource('menus', MenuController::class)->except(['show', 'edit', 'create', 'destroy']);
});

Route::group([
    'middleware' => 'web',
    'namespace' => 'App\Http\Controllers',
    'as' => 'home.'
], function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/contact', [WebContactController::class, 'index'])->name('contact');
    Route::post('/contact', [WebContactController::class, 'store'])->name('contact.post');
    // dynamic page
    Route::get('/page/{slug}', [HomeController::class, 'page'])->name('page');
});
