<?php

namespace Database\Seeders;

use App\Models\Produtos;
use App\Models\Relatorio;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Relatorio::factory(10)->create();
        Produtos::factory(10)->create();
    }
}
