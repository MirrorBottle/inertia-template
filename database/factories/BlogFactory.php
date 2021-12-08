<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words($nb = 5, $asText = true);

        return [
            'category_id' => 2,
            'user_id' => 1,
            'title' => $title,
            'slug' => Str::slug($title),
            'publish_date' => date('Y-m-d'),
            'published' => TRUE,
            'excerpt' => $this->faker->text,
            'content' => $this->faker->text,
            'views' => rand(10, 100)
        ];
    }
}
