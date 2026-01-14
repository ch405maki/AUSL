<?php

use App\Http\Controllers\CounterController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/countdown', [CounterController::class, 'index'])->name('countdown.index');
    Route::post('/admin/countdown', [CounterController::class, 'store'])->name('countdown.store');
    Route::put('/admin/countdown/{event}', [CounterController::class, 'update'])->name('countdown.update');
    Route::delete('/admin/countdown/{event}', [CounterController::class, 'destroy'])->name('countdown.destroy');
    Route::post('/admin/countdown/{event}/toggle', [CounterController::class, 'toggleActive'])->name('countdown.toggle');
});
