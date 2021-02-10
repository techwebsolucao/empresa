<?php

namespace Tests\Feature;

use App\Models\Relatorio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BuscarRelatorio extends TestCase
{
    use RefreshDatabase;

    public function criarRelatorio()
    {
        Relatorio::factory(10)->create();
    }
}
