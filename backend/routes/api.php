<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProcedimentoController;

Route::apiResource('clientes', ClienteController::class);
Route::apiResource('procedimentos', ProcedimentoController::class);
