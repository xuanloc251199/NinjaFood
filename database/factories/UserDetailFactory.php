<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => function() {
                return \App\Models\User::factory()->create()->id;
            },
            'address' => $this->faker->address(),
            'phone_number'=>  $this->faker->phoneNumber(),
            'avt'=> $this->faker->imageUrl()
        ];
    }
}
