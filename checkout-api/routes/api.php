<?php

use App\Http\Controllers\OrderCreatedController;
use App\Http\Controllers\PromoCheckedController;
use Illuminate\Support\Facades\Route;

Route::post('/order', OrderCreatedController::class);
Route::post('/promo', PromoCheckedController::class);