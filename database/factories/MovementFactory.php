<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movement>
 */
class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipo' => $this->faker->randomElement(['entrada', 'salida']),
            'description' =>  $this->faker->paragraph(5),
            'product_id' => $this->faker->numberBetween(0,10),
            'clieprov_id' => $this->faker->numberBetween(0,10),
            'user_id' => $this->faker->numberBetween(0,3),

            'cantidad' =>  $this->faker->randomFloat(1, 10, 20),
            
            'status' => 
            $this->faker->numberBetween(0,1),

            'lote' => $this->faker->name(),

        ];
    }
}
