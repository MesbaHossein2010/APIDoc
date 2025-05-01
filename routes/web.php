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

Route::prefix('admin')->group(function () {
    // Docs
    Route::get('docs', fn () => view('admin.docs.index'))->name('admin.docs.index');
    Route::get('docs/create', fn () => view('admin.docs.create'))->name('admin.docs.create');
    Route::get('docs/{id}/edit', fn () => view('admin.docs.edit'))->name('admin.docs.edit');
    Route::get('docs/delete/{id}', fn () => view('admin.docs.index'))->name('admin.docs.delete');
    Route::get('docs/{id}', fn () => view('admin.docs.show'))->name('admin.docs.show');

    // Sections
    Route::get('sections', fn () => view('admin.sections.index'))->name('admin.sections.index');
    Route::get('sections/create', fn () => view('admin.sections.create'))->name('admin.sections.create');
    Route::get('sections/{id}/edit', fn () => view('admin.sections.edit'))->name('admin.sections.edit');
    Route::get('sections/delete/{id}', fn () => view('admin.sections.index'))->name('admin.sections.delete');

    // Dashboard
    Route::get('dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

// ----------------------
// Public Routes
// ----------------------

Route::get('/', fn () => view('public.docs'))->name('public.docs');
Route::get('/docs/{slug}', fn () => view('public.doc-detail'))->name('public.doc-detail');
Route::get('/search', fn () => view('public.search-results'))->name('public.search');

// ----------------------
// Error Routes (for testing only)
// ----------------------

Route::get('/simulate-404', fn () => abort(404))->name('error.404');
Route::get('/simulate-500', fn () => abort(500))->name('error.500');
Route::get('/simulate-maintenance', fn () => view('errors.maintenance'))->name('error.maintenance');
