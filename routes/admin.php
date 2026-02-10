<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SpecialisteController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ProController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DeroulantController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AProposController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\FileUploadController;
use Illuminate\Support\Facades\Route;

// Explicit model bindings for resource routes
Route::model('professionnel', \App\Models\Pro::class);
Route::model('actualite', \App\Models\Blog::class);

// Auth routes (no admin middleware)
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Protected admin routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // File upload (AJAX)
    Route::post('/upload', [FileUploadController::class, 'store'])->name('upload');

    // Resource routes
    Route::resource('specialistes', SpecialisteController::class)->except('show');
    Route::resource('slides', SlideController::class)->except('show');
    Route::resource('professionnels', ProController::class)->except('show');
    Route::resource('categories', ProductCategoryController::class)->except('show');
    Route::resource('produits', ProductController::class)->except('show');
    Route::resource('deroulants', DeroulantController::class)->except('show');
    Route::resource('actualites', BlogController::class)->except('show');

    // A propos (single record)
    Route::get('/a-propos', [AProposController::class, 'index'])->name('a-propos.index');
    Route::get('/a-propos/{aPropos}/edit', [AProposController::class, 'edit'])->name('a-propos.edit');
    Route::put('/a-propos/{aPropos}', [AProposController::class, 'update'])->name('a-propos.update');

    // Settings
    Route::get('/parametres', [SettingsController::class, 'index'])->name('parametres.index');
    Route::put('/parametres', [SettingsController::class, 'update'])->name('parametres.update');
});
