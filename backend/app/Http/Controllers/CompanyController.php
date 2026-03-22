<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    
    public function index()
    {
         // Retorna todas as empresas em JSON, paginando 10 por página
        return response()->json(Company::paginate(10));
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:companies,email',
        'website' => 'nullable|url',
    ]);

    // Cria a empresa no banco
    $company = Company::create($request->all());

    // Retorna a empresa criada em JSON
    return response()->json($company, 201);
    }

    public function show(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        // Busca a empresa pelo ID
    $company = Company::findOrFail($id);

    // Validação dos dados recebidos
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:companies,email,' . $id,
        'website' => 'nullable|url',
    ]);

    // Atualiza a empresa com os dados recebidos
    $company->update($request->all());

    // Retorna a empresa atualizada em JSON
    return response()->json($company);
    }


    public function destroy(string $id)
    {
        // Busca a empresa pelo ID ou retorna erro 404
    $company = Company::findOrFail($id);

    // Deleta a empresa
    $company->delete();

    // Retorna uma mensagem de sucesso
    return response()->json(['message' => 'Empresa deletada com sucesso']);
    }
}
