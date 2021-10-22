<?php

namespace Database\Factories;

use App\Models\Images;
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
            'product_id' => rand(1, 30),
            'image' => 'images/illustration-' . $image . '.png',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
