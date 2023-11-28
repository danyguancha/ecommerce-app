<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fk_category_id' => $this->faker->randomElement(Category::pluck('id_category')),
            'code' => $this->faker->word,
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(200000, 10000000),
            'stock' => $this->faker->randomNumber(5),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(640, 480, 'cellphone'),
            'estado' => $this->faker->randomElement(['Available', 'Discontinued']),
        ];
    }
}
