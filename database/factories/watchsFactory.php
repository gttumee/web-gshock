<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class watchsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->cityPrefix(),
            'price' => $this->faker->randomNumber(2),
            'brand' => $this->faker->cityPrefix(),
            'text' => $this->faker->realText(),
            'picture' => $this->faker->realText(),
            'allpicture' => $this->faker->realText(),
            'type' => $this->faker->creditCardType()
        ];
    }
}