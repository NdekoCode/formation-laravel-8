<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = '\App\Models\Blog\Video';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'url' => 'https://www.youtube.com/watch?v=Ide3jNW_6R8'
        ];
    }
}
