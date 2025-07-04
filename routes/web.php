<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::post('/tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');
