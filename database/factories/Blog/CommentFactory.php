<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraphs(mt_rand(1, 3), true),
            'commentable_id' => $this->faker->numberBetween(1, 50),
            'commentable_type' => $this->faker->numberBetween(1, 10) % 2 === 0 ? 'App\Models\Post' : 'App\Models\Video'
        ];
    }
}
