<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/place', [AdminController::class, 'place'])->middleware(['auth'])->name('place');
Route::post('/add-place', [AdminController::class, 'addTempat'])->middleware(['auth'])->name('add-place');
Route::post('/edit-place', [AdminController::class, 'editTempat'])->middleware(['auth'])->name('edit-place');
Route::get('/delete-place/{id}', [AdminController::class, 'deleteTempat'])->middleware(['auth'])->name('delete-place');

Route::get('/menu/{id}', [AdminController::class, 'menu'])->middleware(['auth'])->name('menu');
Route::post('/add-menu', [AdminController::class, 'addMenu'])->middleware(['auth'])->name('add-menu');
Route::post('/edit-menu', [AdminController::class, 'editMenu'])->middleware(['auth'])->name('edit-menu');
Route::get('/delete-menu/{place_id}/{id}', [AdminController::class, 'deleteMenu'])->middleware(['auth'])->name('delete-menu');

require __DIR__.'/auth.php';
