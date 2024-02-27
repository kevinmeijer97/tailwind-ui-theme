<?php

use Illuminate\Support\Facades\Route;
use Statamic\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index']);
