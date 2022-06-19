<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    protected $model = '\App\Models\Blog\PostTag';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween(1, 50),
            'tag_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
