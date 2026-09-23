<?php

class Exemplo
{
    // ruleid: laravel-hardcoded-secret
    private const FRETE_API_KEY = 'frete-demo-9d1c7b2e5a8f4d3c6b1a';

    // ruleid: laravel-hardcoded-secret
    private $clientSecret = 'a8f4d3c6b1a9d1c7';

    // ok: laravel-hardcoded-secret
    private const TOKEN_TTL = 3600;

    // ok: laravel-hardcoded-secret
    private const CACHE_KEY_PREFIX = 'x';

    public function configurar()
    {
        // ruleid: laravel-hardcoded-secret
        $senha = 'Sup3rS3cret!';

        // ok: laravel-hardcoded-secret
        $apiKey = env('FRETE_API_KEY');

        // ok: laravel-hardcoded-secret
        $tokenLabel = 'Seu token expirou';

        return [
            // ruleid: laravel-hardcoded-secret
            'api_key' => 'k3y-9d1c7b2e5a8f',
            // ok: laravel-hardcoded-secret
            'secret' => config('services.frete.secret'),
        ];
    }
}
