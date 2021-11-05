<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiteController;
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

// Site
Route::get('/', [SiteController::class, 'index']);
Route::get('/technical', [SiteController::class, 'technical']);
Route::get('/about', [SiteController::class, 'about']);

// Project
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);

// Articles
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

// Category
Route::get('/categories/{category:slug}', [CategoriesController::class, 'show']);

// Search
Route::get('/search', [SearchController::class, 'index']);

// Products
Route::get('/products/{product:slug}', [ProductController::class, 'show']);

// ----------------------------------------Admin---------------------------------------------------------------
Route::group(['prefix' => 'admin'], function () {
    // Admin Products
    Route::resource('products', AdminProductController::class)->names('admin.products');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
