<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FichasController;

// Esto crea automáticamente todas las rutas RESTful
Route::apiResource('fichas', FichasController::class);

