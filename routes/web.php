<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Public pages
Route::get('/', [TaskController::class, 'index'])
    ->name('home');

Route::get('/tasks', [TaskController::class, 'tasks'])
    ->name('tasks');

Route::get('/profile', [TaskController::class, 'profile'])
    ->name('profile');

Route::get('/about', [TaskController::class, 'about'])
    ->name('about');

// Protected task management routes
Route::middleware(['auth'])->group(function () {

    Route::get('/tasks/create', [TaskController::class, 'create'])
        ->name('tasks.create');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit');

    Route::put('/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');
});

// Laravel Breeze authentication routes
require __DIR__.'/auth.php';
