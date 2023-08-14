<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'index']);

Route::name('tasks.')->group(function () {
    Route::post('/add', [TodoController::class, 'add'])->name('add');
    Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('edit');
    Route::get('/{id}/delete', [TodoController::class, 'delete'])->name('delete');
});
