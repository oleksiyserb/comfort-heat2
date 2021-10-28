<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(5, 10));

        return [
            'category_id' => rand(1, 20),
            'author_id' => rand(1, 10),
            'name' => $title,
            'price' => $this->faker->randomNumber(),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->text(rand(40, 100)),
            'body' => $this->faker->realText(rand(1000, 4000)),
            'manufacturer' => $this->faker->name(rand(1, 10)),
            'status' => rand(1, 2),
            'technical' => $this->faker->realText(rand(1000, 4000)),
            'model' => $this->faker->name(rand(1, 10)),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
