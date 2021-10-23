<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->randomElement([rand(1, 5)]);
        $name = $this->faker->sentence(rand(5, 10));
        $isPublished = rand(1,5) > 1;

        return [
            'author_id' => rand(1, 10),
            'name' => $name,
            'excerpt' => $this->faker->text(rand(40, 100)),
            'body' => $this->faker->paragraph(rand(1, 4)),
            'slug' => $this->faker->unique()->slug(),
            'image' => 'images/illustration-' . $image . '.png',
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
