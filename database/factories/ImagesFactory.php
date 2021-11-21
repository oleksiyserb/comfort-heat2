<?php

namespace Database\Factories;

use App\Models\Images;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Images::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->randomElement([rand(1, 5)]);

        return [
            'product_id' => Product::factory(),
            'image' => 'images/illustration-' . $image . '.png',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
