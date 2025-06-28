<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    public function index(Request $request)
    {
        $query = Procedimento::with('cliente');

        if ($request->has('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        return $query->orderBy('data_procedimento', 'desc')->get();
    }
}
