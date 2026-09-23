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

    // VULN-02
    public function test_busca_nao_reflete_script_sem_escapar(): void
    {
        $payload = '<script>alert(1)</script>';

        $response = $this->get('/produtos?q='.urlencode($payload));

        // false = compara com o HTML bruto, sem o assertSee escapar o texto antes
        $response->assertDontSee($payload, false);
        $response->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false);
    }

    // VULN-03
    public function test_cadastro_ignora_campo_aprovado_enviado_pelo_usuario(): void
    {
        $this->post('/produtos', [
            'nome' => 'Produto do atacante',
            'preco' => 10,
            'aprovado' => 1, // campo que não existe no formulário
        ]);

        $produto = Produto::where('nome', 'Produto do atacante')->first();

        $this->assertNotNull($produto);
        $this->assertFalse((bool) $produto->aprovado);
    }

    // achado "Buffer/Integer Overflow" do ZAP: input inválido não pode virar erro 500
    public function test_cadastro_sem_preco_retorna_erro_de_validacao(): void
    {
        $this->post('/produtos', ['nome' => 'Sem preço'])
            ->assertSessionHasErrors('preco');
    }

    public function test_cadastro_com_nome_gigante_retorna_erro_de_validacao(): void
    {
        $this->post('/produtos', ['nome' => str_repeat('A', 10000), 'preco' => 10])
            ->assertSessionHasErrors('nome');
    }
}
