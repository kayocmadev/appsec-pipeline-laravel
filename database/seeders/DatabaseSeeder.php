<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Produto::create(['nome' => 'Disjuntor 20A', 'preco' => 32.90, 'aprovado' => true]);
        Produto::create(['nome' => 'Cabo 2,5mm 100m', 'preco' => 289.00, 'aprovado' => true]);
    }
}
