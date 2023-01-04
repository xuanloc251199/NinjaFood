<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_discount" => $this->faker->randomDigitNotNull(),
            "id_shop" => $this->faker->randomDigitNotZero(),
            "name" => $this->faker->name(),
            "thumbnail"=> $this->faker-> imageUrl,
            "price" => $this->faker->randomFloat(2,0,100),
            "description" => "Miêu tả món ăn bằng tiếng Anh cũng là chủ đề thường gặp trong cuộc sống hàng ngày. Khi muốn giới thiệu một món ăn với vị khách nước ngoài, bạn có thể mô tả cách làm cũng như hương vị của món ăn. Chắc chắn những từ vựng dùng để miêu tả món ăn bằng tiếng Anh",
            "image" => $this->faker->imageUrl(),
            "rate" => $this->faker->randomFloat(1,0,5),
            "amount" => $this->faker->randomDigitNotZero(),
            "bought_amount"=> $this->faker->randomDigitNotZero(),
            'id_category' => $this->faker->randomDigitNotZero()
        ];
    }
}
