<?php

namespace Database\Factories;

use App\Models\Gastos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gastos>
 */
class GastosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Gastos::class;
    public function definition(): array
    {
        return [
            'categori_id'=>rand(1,4),
            'cantidad'=>fake()->biasedNumberBetween(1,999),
            'description'=>fake()->text(),
            'date'=>fake()->date()
        ];
    }
}
