<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dados extends Model
{
    protected $fillable = [
    	
        'processo',
        'nome_contribuinte',
    	'endereco_visita',
    	'data',
        'hora',
        'status',
    ];
}
