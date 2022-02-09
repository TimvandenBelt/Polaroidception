<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();
        return [
            "title" => $title,
            "slug" => Str::slug($title),
            "body" => $this->faker->paragraphs(6, true),
            "excerpt" => $this->faker->paragraph(),
        ];
    }
}
