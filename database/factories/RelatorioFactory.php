<?php

namespace Database\Factories;

use App\Models\Relatorio;
use Illuminate\Database\Eloquent\Factories\Factory;

class RelatorioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Relatorio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'descricao' => $this->faker->text,
            'data' => $this->faker->date('Y-m-d'),
            'quantidade' => 100,
            'opcao' => 'add',
            'id_produto' => '[5,2,1,6]'// password
        ];
    }
}
