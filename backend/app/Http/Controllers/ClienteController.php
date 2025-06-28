<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listar todos os clientes
    public function index()
    {
        return Cliente::all();
    }

    // Cadastrar novo cliente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf',
            'data_nascimento' => 'required|date',
            'profissao' => 'nullable|string|max:255',
            'celular' => 'required|string|max:20',
        ]);

        $cliente = Cliente::create($validated);

        return response()->json([
            'mensagem' => 'Cliente cadastrado com sucesso!',
            'cliente' => $cliente
        ], 201);
    }

    // Exibir cliente específico
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente;
    }

    // Atualizar cliente
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $id,
            'data_nascimento' => 'required|date',
            'profissao' => 'nullable|string|max:255',
            'celular' => 'required|string|max:20',
        ]);

        $cliente->update($validated);

        return response()->json([
            'mensagem' => 'Cliente atualizado com sucesso!',
            'cliente' => $cliente
        ]);
    }

    // Deletar cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return response()->json([
            'mensagem' => 'Cliente excluído com sucesso!'
        ]);
    }

    // Atualizao pra ver se roda 

    public function depilacoes($id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente->procedimentos()->where('tipo', 'depilacao')->orderBy('data_procedimento', 'desc')->get();
    }

    // Listar micropigmentações de um cliente
    public function micropigmentacoes($id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente->procedimentos()->where('tipo', 'micropigmentacao')->orderBy('data_procedimento', 'desc')->get();
    }
}
