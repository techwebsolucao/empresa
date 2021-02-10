<?php

namespace Database\Factories;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProdutosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produtos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'quantidade' => $this->faker->randomNumber(3),
            'codigo_produto' => $this->faker->unique()->randomNumber(5),
            'data' => $this->faker->date('Y-m-d')
        ];
    }
}
