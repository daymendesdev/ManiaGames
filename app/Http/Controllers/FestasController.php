<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festa;
use Illuminate\Support\Facades\Validator;

class FestasController extends Controller
{
    public function index()
    {
        $datas_ocupadas = Festa::pluck('data_festa')->toArray();
        return view('festas.index', compact('datas_ocupadas'));
    }

    public function datasOcupadas()
    {
        $datas = Festa::pluck('data_festa')->toArray();
        return response()->json($datas);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'rg' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'cep' => 'required',
            'celular' => 'required',
            'data_festa' => 'required|date',
            'horario' => 'required',
            'pacote' => 'required',
            'valor' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $festa = Festa::create($request->all());
        return response()->json(['success' => true, 'festa' => $festa]);
    }
}
