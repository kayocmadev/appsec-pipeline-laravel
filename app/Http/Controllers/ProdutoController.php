<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoController extends Controller
{
    // VULN-04 (segredo hardcoded): chave fake, mas no lugar errado
    private const FRETE_API_KEY = 'frete-demo-9d1c7b2e5a8f4d3c6b1a';

    public function index(Request $request)
    {
        $q = $request->input('q', '');

        // VULN-01 corrigida: o Query Builder envia $q como binding, separado do SQL
        $produtos = Produto::where('nome', 'like', "%{$q}%")->get();

        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function store(Request $request)
    {
        // VULN-03 (mass assignment): aceita qualquer campo do request
        Produto::create($request->all());

        return redirect()->route('produtos.index');
    }

    public function frete(Request $request)
    {
        return Http::withToken(self::FRETE_API_KEY)
            ->get('https://api.exemplo-frete.com/cotacao', ['cep' => $request->input('cep')])
            ->json();
    }
}
