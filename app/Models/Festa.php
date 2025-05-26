<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festa extends Model
{
    protected $fillable = [
        'nome', 'rg', 'cpf', 'endereco', 'cep', 'celular',
        'data_festa', 'horario', 'pacote', 'valor', 'status_pagamento', 'forma_pagamento'
    ];
}
