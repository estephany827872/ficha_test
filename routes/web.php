<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichaController;
use App\Models\Ficha;

// Ruta principal
Route::get('/', function () {
    return view('Ficha.index');
});

// Alternativa: Usar resource (genera todas las rutas CRUD automáticamente)
Route::resource('Ficha', FichaController::class);

