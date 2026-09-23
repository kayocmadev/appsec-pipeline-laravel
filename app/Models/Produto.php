<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // VULN-03 corrigida: lista branca; "aprovado" fica de fora do preenchimento em massa
    protected $fillable = ['nome', 'preco', 'descricao'];

    protected $casts = [
        'aprovado' => 'boolean',
    ];
}
