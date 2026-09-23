<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Adiciona headers de segurança em toda resposta (achados do ZAP/DAST).
 * HSTS (Strict-Transport-Security) fica de fora: só vale sob HTTPS, e deve
 * ser configurado no servidor web de produção.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $headers = [
            // só carrega recursos do próprio site; bloqueia plugins e iframes externos
            'Content-Security-Policy' => implode('; ', [
                "default-src 'self'",
                "img-src 'self' data:",
                "object-src 'none'",
                "base-uri 'self'",
                "form-action 'self'",
                "frame-ancestors 'none'",
            ]),
            'X-Frame-Options' => 'DENY', // anti-clickjacking (navegadores antigos)
            'X-Content-Type-Options' => 'nosniff',
            'Referrer-Policy' => 'strict-origin-when-cross-origin',
            'Permissions-Policy' => 'camera=(), microphone=(), geolocation=()',
            'Cross-Origin-Opener-Policy' => 'same-origin',
            'Cross-Origin-Resource-Policy' => 'same-origin',
            'Cross-Origin-Embedder-Policy' => 'require-corp',
        ];

        foreach ($headers as $nome => $valor) {
            $response->headers->set($nome, $valor);
        }

        // não anunciar a versão do PHP (header adicionado pelo próprio PHP)
        header_remove('X-Powered-By');
        $response->headers->remove('X-Powered-By');

        return $response;
    }
}
