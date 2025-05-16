<?php

namespace App\Http\Controllers\Avaliacoes;

use App\Http\Controllers\Controller;
use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $avaliacoes = Avaliacao::orderBy('created_at', 'desc')->get();
        $mediaAvaliacoes = Avaliacao::avg('nota');
        $totalAvaliacoes = Avaliacao::count();
        
        return view('avaliacoes.avaliacoes', compact('avaliacoes', 'mediaAvaliacoes', 'totalAvaliacoes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'email' => 'required|email|unique:avaliacoes,email',
                'avaliacao' => 'required|string',
                'nota' => 'required|integer|min:1|max:5'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($e->validator->errors()->has('email')) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Só é permitida uma avaliação por pessoa');
            }
            throw $e;
        }

        Avaliacao::create($request->all());

        return redirect()->route('avaliacoes')
            ->with('avaliacao_enviada', true);
    }
} 