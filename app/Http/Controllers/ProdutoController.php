<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q', '');

        // VULN-01 corrigida: o Query Builder envia $q como binding, separado do SQL
        $produtos = Produto::where('nome', 'like', "%{$q}%")->get();

        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function store(Request $request)
    {
        // VULN-03 corrigida: só os campos validados chegam no create()
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'descricao' => ['nullable', 'string', 'max:2000'],
        ]);

        Produto::create($dados);

        return redirect()->route('produtos.index');
    }

    public function frete(Request $request)
    {
        return Http::withToken(config('services.frete.key')) // VULN-04 corrigida: chave vem do .env
            ->get('https://api.exemplo-frete.com/cotacao', ['cep' => $request->input('cep')])
            ->json();
    }
}
