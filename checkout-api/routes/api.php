<?php

use App\Http\Controllers\OrderCreatedController;
use Illuminate\Support\Facades\Route;

Route::post('/order', OrderCreatedController::class);