<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    public array $program = ['Full-Time', 'Part-Time'];
    public array $level = ["Entry", "Mid", "Expert", "Senior", "God"];
    public array $jobs = ["Java Developer", "Frontend Developer", "DevOps Engineer", "Fullstack Web Developer", "UX/UI Designer", "Angular Specialist"];

    public function getProgram($program)
    {
        $randIdX = array_rand($program);

        return $program[$randIdX];
    }
    public function getRandomName($namesArray) {
        // Generate a random index within the array's bounds
        $randomIndex = array_rand($namesArray);

        // Return the name associated with the random index
        return $namesArray[$randomIndex];
    }
    public function getRandomJob($job) {
        // Generate a random index within the array's bounds
        $randomIndex = array_rand($job);

        // Return the name associated with the random index
        return $job[$randomIndex];
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => self::getRandomJob($this->jobs),
            'tags' => 'cloud, develop, planning',
            'company' => fake()->company(),
            'location' => fake()->address(),
            'web' => fake()->url(),
            'email' => fake()->companyEmail(),
            'level' => self::getRandomName($this->level),
            'program' => self::getProgram($this->program),
            'salary' => fake()->randomNumber(5, true),
            'description' => fake()->paragraph(5),
            'details' => fake()->paragraph(5),
            'benefits' => fake()->paragraph(5)
        ];
    }
}
