<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>

    <form method="GET" action="{{ route('produtos.index') }}">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar">
        <button type="submit">Buscar</button>
    </form>

    @if (request('q'))
        {{-- VULN-02 (XSS refletido): {!! !!} não escapa o HTML --}}
        <p>Resultados para: {!! request('q') !!}</p>
    @endif

    <ul>
        @foreach ($produtos as $produto)
            <li>{{ $produto->nome }} — R$ {{ number_format($produto->preco, 2, ',', '.') }}</li>
        @endforeach
    </ul>

    <h2>Novo produto</h2>
    <form method="POST" action="{{ route('produtos.store') }}">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="number" step="0.01" name="preco" placeholder="Preço" required>
        <textarea name="descricao" placeholder="Descrição"></textarea>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
