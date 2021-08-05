<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/restaurants', [HomeController::class, 'restaurants']);
Route::get('/menus', [HomeController::class, 'menus']);
Route::get('/menuresto/{id}', [HomeController::class, 'menuresto']);

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth','is_admin'])->name('dashboard');
Route::get('/place', [AdminController::class, 'place'])->middleware(['auth','is_admin'])->name('place');
Route::post('/add-place', [AdminController::class, 'addTempat'])->middleware(['auth','is_admin'])->name('add-place');
Route::post('/edit-place', [AdminController::class, 'editTempat'])->middleware(['auth','is_admin'])->name('edit-place');
Route::get('/delete-place/{id}', [AdminController::class, 'deleteTempat'])->middleware(['auth','is_admin'])->name('delete-place');

Route::get('/menu/{id}', [AdminController::class, 'menu'])->middleware(['auth','is_admin'])->name('menu');
Route::post('/add-menu', [AdminController::class, 'addMenu'])->middleware(['auth','is_admin'])->name('add-menu');
Route::post('/edit-menu', [AdminController::class, 'editMenu'])->middleware(['auth','is_admin'])->name('edit-menu');
Route::get('/delete-menu/{place_id}/{id}', [AdminController::class, 'deleteMenu'])->middleware(['auth','is_admin'])->name('delete-menu');

Route::post('/add-image', [AdminController::class, 'addImage'])->middleware(['auth','is_admin'])->name('add-image');
Route::get('/delete-image/{place_id}/{id}', [AdminController::class, 'deleteImage'])->middleware(['auth','is_admin'])->name('delete-image');
require __DIR__.'/auth.php';
