<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dados extends Model
{
    protected $fillable = [
    	
        'processo',
        'cpf',
        'nome_contribuinte',
    	'endereco_visita',
    	'data',
        'hora',
        'status',
        'statusinterno',
        'arquivado',
    ];
}
