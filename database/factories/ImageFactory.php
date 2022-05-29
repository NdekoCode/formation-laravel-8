<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => 'https://picsum.photos/id/' . $this->faker->unique()->numberBetween(237, 550) . '/1200/540',
            'post_id' => $this->faker->unique()->numberBetween(1, 50),
        ];
    }
}
