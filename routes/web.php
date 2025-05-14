<?php

use App\Http\Controllers\DocController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// ----------------------
// English Admin Routes
// ----------------------

Route::prefix('admin')->group(function () {
    // Authentication
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.showLogin');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware(['CheckAuth'])->group(function () {
        // Dashboard
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

        // Docs Routes
        Route::get('docs', [DocController::class, 'AdminIndex'])->name('admin.docs.index');
        Route::post('docs', [DocController::class, 'AdminSearch'])->name('admin.docs.search');
        Route::get('docs/create', [DocController::class, 'create'])->name('admin.docs.create');
        Route::post('docs/store', [DocController::class, 'store'])->name('admin.docs.store');
        Route::get('docs/{id}/edit', [DocController::class, 'edit'])->name('admin.docs.edit');
        Route::post('docs/{id}/update', [DocController::class, 'update'])->name('admin.docs.update');
        Route::get('docs/delete/{id}', [DocController::class, 'destroy'])->name('admin.docs.delete');
        Route::get('docs/{id}', [DocController::class, 'show'])->name('admin.docs.show');

        // Sections Routes
        Route::get('sections', [SectionController::class, 'AdminIndex'])->name('admin.sections.index');
        Route::post('sections', [SectionController::class, 'AdminSearch'])->name('admin.sections.search');
        Route::get('sections/create', [SectionController::class, 'create'])->name('admin.sections.create');
        Route::post('sections/store', [SectionController::class, 'store'])->name('admin.sections.store');
        Route::get('sections/{id}/edit', [SectionController::class, 'edit'])->name('admin.sections.edit');
        Route::post('sections/{id}/update', [SectionController::class, 'update'])->name('admin.sections.update');
        Route::get('sections/delete/{id}', [SectionController::class, 'destroy'])->name('admin.sections.delete');
        Route::get('sections/{id}', [SectionController::class, 'show'])->name('admin.sections.show');
    });
});

// ----------------------
// Public Routes (for both English and Persian)
// ----------------------

Route::get('/docs', [DocController::class, 'index'])->name('public.docs');
Route::post('/docs', [DocController::class, 'search']);
Route::get('/', function (){
    redirect()->route('public.docs');
});

// ----------------------
// Error Routes (for both English and Persian)
// ----------------------

Route::get('/simulate-404', fn () => abort(404))->name('error.404');
Route::get('/simulate-500', fn () => abort(500))->name('error.500');
Route::get('/simulate-maintenance', fn () => view('errors.maintenance'))->name('error.maintenance');
