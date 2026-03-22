<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

// Rota GET para listar todas as empresas
// URL: /api/companies
// Retorna JSON paginado (10 empresas por página)
Route::get('/companies', [CompanyController::class, 'index']);

// Rota POST para criar nova empresa
// Valida dados: name, email, website
// Retorna a empresa criada em JSON com status 201
Route::post('/companies', [CompanyController::class, 'store']);

// Rota PUT para atualizar uma empresa existente
// Valida dados: name, email, website
// Retorna a empresa atualizada em JSON
Route::put('/companies/{id}', [CompanyController::class, 'update']);

// Rota DELETE para remover uma empresa pelo ID
// Retorna mensagem de sucesso em JSON
Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);

