<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'tags' => 'software, dev, tag3',
            'company' => fake()->company(),
            'location' => fake()->address(),
            'web' => fake()->url(),
            'email' => fake()->companyEmail(),
            'description' => fake()->paragraph(5)
        ];
    }
}
