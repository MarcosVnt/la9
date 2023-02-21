<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'code' => $this->faker->ean8(),
            'name' => $this->faker->name(),
            'ean' => $this->faker->ean8(),

            'description' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1,1),
            'price' => $this->faker->randomFloat(2,30,40),
            'medida' =>  $this->faker->word(),
            'status' => true,
            

        ];
    }
}
