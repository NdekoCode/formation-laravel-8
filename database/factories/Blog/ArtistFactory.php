<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
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
            'image_id' => $this->faker->numberBetween(1, 50),
            'avatar' => "https://picsum.photos/300/300?random=" . $this->faker->numberBetween(1, 50)
        ];
    }
}
