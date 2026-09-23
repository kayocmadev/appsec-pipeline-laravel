<!-- ruleid: laravel-blade-unescaped-output -->
<p>Resultados para: {!! request('q') !!}</p>

<!-- ok: laravel-blade-unescaped-output -->
<p>Resultados para: {{ request('q') }}</p>

<!-- ok: laravel-blade-unescaped-output -->
{{-- comentário explicando que {!! !!} não escapa --}}
