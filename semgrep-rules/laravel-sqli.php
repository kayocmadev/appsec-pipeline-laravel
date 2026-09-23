<?php

use App\Models\Produto;
use Illuminate\Support\Facades\DB;

function vulneravel($request)
{
    $q = $request->input('q');

    // ruleid: laravel-sqli-raw-query
    DB::select("SELECT * FROM produtos WHERE nome LIKE '%$q%'");

    // ruleid: laravel-sqli-raw-query
    DB::select('SELECT * FROM produtos WHERE id = ' . $request->query('id'));

    // ruleid: laravel-sqli-raw-query
    Produto::whereRaw("preco > $q")->get();
}

function seguro($request)
{
    $q = $request->input('q');

    // ok: laravel-sqli-raw-query
    DB::select('SELECT * FROM produtos WHERE nome LIKE ?', ["%$q%"]);

    // ok: laravel-sqli-raw-query
    Produto::where('nome', 'like', "%$q%")->get();

    // ok: laravel-sqli-raw-query
    Produto::whereRaw('preco > ?', [$q])->get();
}
