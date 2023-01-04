<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'avt'=>  $this->faker->image(),
        ];
    }
}
