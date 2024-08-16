<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\ProfileController;
use App\Models\About;
use App\Models\HomeSlide;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pageData = HomeSlide::find(1);
    $about = About::find(1);
    return view('frontend.index', compact('pageData', 'about'));
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// All Admin Routes
Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'Profile')->name('admin.profile');
    Route::get('admin/edit', 'EditProfile')->name('admin.edit');
    Route::post('admin/store', 'StoreProfile')->name('admin.store');
    Route::get('admin/password', 'ChangePassword')->name('admin.password');
    Route::post('admin/update', 'UpdatePassword')->name('admin.update');
});

// All Home Slide Routes
Route::controller(HomeSlideController::class)->group(function () {
    Route::get('home/slide', 'Home')->name('home_slide.home');
    Route::post('home/slide/update', 'Update')->name('home_slide.update');
});

// All About Page Routes
Route::controller(AboutController::class)->group(function () {
    Route::get('about/edit', 'edit')->name('about.edit');
    Route::post('about/update', 'update')->name('about.update');
    Route::get('about', 'index')->name('about.home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
