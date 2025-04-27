<?php

use App\Http\Controllers\PendaftarController;

Route::resource('pendaftar', PendaftarController::class);

// Tambahan untuk fitur soft delete
Route::get('pendaftar-deleted', [PendaftarController::class, 'deleted'])->name('pendaftar.deleted');
Route::post('pendaftar/{id}/restore', [PendaftarController::class, 'restore'])->name('pendaftar.restore');
Route::delete('pendaftar/{id}/force-delete', [PendaftarController::class, 'forceDelete'])->name('pendaftar.forceDelete');
