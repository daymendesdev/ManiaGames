<?php

namespace App\Http\Controllers\avaliacoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvaliacoesController extends Controller
{
    public function index(Request $request)
    {
        return view('avaliacoes.avaliacoes');
    }
}
