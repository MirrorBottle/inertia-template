<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'caption' => $this->faker->words(5, true),
            'published' => TRUE,
            'content' => $this->faker->text,
            'desc' => $this->faker->text,
            'views' => rand(10, 100)
        ];
    }
}
