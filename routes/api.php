<?php

declare(strict_types=1);

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => '/tasks', 'as' => 'api.tasks'],
    static function () {
        Route::post('/', [TaskController::class, 'create'])->name('create');
        Route::get('/', [TaskController::class, 'index'])->name('index');
        Route::get('/{id}', [TaskController::class, 'show'])->name('show');
        Route::put('/{id}', [TaskController::class, 'update'])->name('update');
        Route::delete('/{id}', [TaskController::class, 'delete'])->name('delete');
    }
);
