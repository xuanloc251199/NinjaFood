<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_shop' => $this->faker->randomDigitNotZero(),
            'name' => "Giam giá",
            'per_hundred'=> $this->faker->randomFloat(2,0,10),
            'amount' => 50,
            'start_at' => $this->faker-> dateTime(),
            'end_at' => $this->faker->dateTime()
        ];
    }
}
