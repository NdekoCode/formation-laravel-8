<?php

namespace Database\Factories\Blog;

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
        $categories = ['blog', 'mangas', 'web', 'girl', 'man', 'brazil', 'rio', 'dog', 'technology', 'computer', 'science', 'programming', 'developer', 'navigator'];
        return [
            'path' => "https://loremflickr.com/1248/832/{$categories[$this->faker->numberBetween(0, count($categories) - 1)]}/?lock={$this->faker->unique()->numberBetween(237, 525)}&random={$this->faker->numberBetween(1, count($categories) - 1)}",
            'post_id' => $this->faker->unique()->numberBetween(1, 50),
        ];
    }
}
