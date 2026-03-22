<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/test-companies', [CompanyController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
