<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // VULN-03 (mass assignment): nenhum campo protegido, inclusive "aprovado"
    protected $guarded = [];
}
