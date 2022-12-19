<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store_category']);
    Route::get('/edit/{category_id}', [CategoryController::class, 'edit']);
    Route::put('/update/{category_id}', [CategoryController::class, 'update']);
    Route::get('/delete/{category_id}', [CategoryController::class, 'delete']);
});
