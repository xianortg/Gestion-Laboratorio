<?php

use App\Http\Controllers\EquipoController;

Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::post('/equipos/guardar', [EquipoController::class, 'store'])->name('equipos.store');

Route::get('/equipos/{id}/editar', [EquipoController::class, 'edit'])->name('equipos.edit');
Route::post('/equipos/{id}/actualizar', [EquipoController::class, 'update'])->name('equipos.update');

Route::get('/equipos/{id}/eliminar', [EquipoController::class, 'destroy'])->name('equipos.destroy');