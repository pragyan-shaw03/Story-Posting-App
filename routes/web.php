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
use App\Http\Controllers\StoryController;

Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
Route::get('/stories/{id}', [StoryController::class, 'show'])->name('stories.show');
Route::get('/stories/{id}/edit', [StoryController::class, 'edit'])->name('stories.edit');
Route::put('/stories/{id}', [StoryController::class, 'update'])->name('stories.update');
Route::delete('/stories/{id}', [StoryController::class, 'destroy'])->name('stories.destroy');
