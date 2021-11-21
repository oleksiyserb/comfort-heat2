<?php

namespace Database\Factories;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projects::class;

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
            'author_id' => User::factory(),
            'name' => $name,
            'excerpt' => $this->faker->text(rand(40, 100)),
            'body' => $this->faker->realText(rand(1000, 4000)),
            'slug' => $this->faker->unique()->slug(),
            'image' => 'images/illustration-' . $image . '.png',
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
