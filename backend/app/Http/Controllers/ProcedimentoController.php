<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    // Listar todos os procedimentos
    public function index()
    {
        return Procedimento::all();
    }

    // Cadastrar um novo procedimento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tipo' => 'required|string',
            'descricao_procedimento' => 'required|string',
            'numero_secao' => 'nullable|string',
            'data_procedimento' => 'nullable|date',
            'observacao' => 'nullable|string',
        ]);

        $procedimento = Procedimento::create($validated);

        return response()->json($procedimento, 201);
    }

    // Exibir um procedimento específico
    public function show($id)
    {
        return Procedimento::findOrFail($id);
    }

    // Atualizar um procedimento
    public function update(Request $request, $id)
    {
        $procedimento = Procedimento::findOrFail($id);

        $validated = $request->validate([
            'cliente_id' => 'sometimes|exists:clientes,id',
            'tipo' => 'sometimes|string',
            'descricao_procedimento' => 'sometimes|string',
            'numero_secao' => 'nullable|string',
            'data_procedimento' => 'nullable|date',
            'observacao' => 'nullable|string',
        ]);

        $procedimento->update($validated);

        return response()->json($procedimento);
    }

    // Deletar um procedimento
    public function destroy($id)
    {
        $procedimento = Procedimento::findOrFail($id);
        $procedimento->delete();

        return response()->json(null, 204);
    }
}