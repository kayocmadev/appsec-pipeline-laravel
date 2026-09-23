<?php

namespace Tests\Feature;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Testes de regressão: cada um repete um ataque real contra a app.
 * Se alguém reintroduzir a falha, o teste quebra.
 */
class SegurancaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Produto::create(['nome' => 'Disjuntor 20A', 'preco' => 32.90]);
    }

    // VULN-01
    public function test_busca_nao_permite_sql_injection_com_union(): void
    {
        $payload = "zzz' UNION SELECT 1,name,0,sql,0,0,0 FROM sqlite_master WHERE type='table' --";

        $response = $this->get('/produtos?q='.urlencode($payload));

        $response->assertOk();
        // se a injeção funcionar, nomes de tabelas internas aparecem na lista de produtos
        $response->assertDontSee('password_reset_tokens');
        $response->assertDontSee('migrations');
    }

    // VULN-01
    public function test_aspa_simples_na_busca_nao_quebra_a_query(): void
    {
        $this->get("/produtos?q=Disjuntor'")->assertOk();
    }
}
