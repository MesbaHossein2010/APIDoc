<?php

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

// --- Public Pages
Route::group([], function () {
    Route::get('/', function () {
        return view('public.index');
    })->name('home');

    Route::get('/docs', function () {
        return view('public.docs');
    })->name('docs.index');

    Route::get('/docs/{slug}', function () {
        return view('public.doc-detail');
    })->name('docs.detail');

    Route::get('/changelog', function () {
        return view('public.changelog');
    })->name('changelog');

    Route::get('/legal', function () {
        return view('public.legal');
    })->name('legal');

    Route::get('/search', function () {
        return view('public.search-results');
    })->name('search');
});

// --- Admin Dashboard Pages
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/docs', function () {
        return view('admin.docs-list');
    })->name('admin.docs.list');

    Route::get('/docs/create', function () {
        return view('admin.doc-create');
    })->name('admin.docs.create');

    Route::get('/sections', function () {
        return view('admin.sections');
    })->name('admin.sections');

    Route::get('/changelog', function () {
        return view('admin.changelog-list');
    })->name('admin.changelog');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');
});

// --- Error Pages (for direct testing)
Route::prefix('errors')->group(function () {
    Route::get('/404', function () {
        return view('errors.404');
    })->name('errors.404');

    Route::get('/500', function () {
        return view('errors.500');
    })->name('errors.500');

    Route::get('/maintenance', function () {
        return view('errors.maintenance');
    })->name('errors.maintenance');
});
