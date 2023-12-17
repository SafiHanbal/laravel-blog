<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(100),
            'category' => null,
            'imageUrl' => null,
            'user_id' => random_int(1, 10),
        ];
    }

    public function withCategory(string $category)
    {
        return $this->state(function (array $attributes) use ($category) {
            return [
                'category' => $category,
                'imageUrl' => 'https://source.unsplash.com/random/300×300/?' . $category,
            ];
        });
    }
}
