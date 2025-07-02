<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\QrController; // <-- Asegúrate de importar este controlador

// Página de inicio y búsqueda por CURP (pública)
Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/buscar', [InicioController::class, 'buscar'])->name('buscar.curp');

// Rutas protegidas por Jetstream para el dashboard, CRUD y QR
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('registros', RegistroController::class)->except(['show']);

    // ✅ Rutas para el generador de QR
    Route::get('/qr-generator', [QrController::class, 'index'])->name('qr.index');
    Route::post('/qr-generator', [QrController::class, 'generate'])->name('qr.generate');
});
