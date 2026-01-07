<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraphs(3, true),
            'location' => $this->faker->city(),
            'salary' => $this->faker->numberBetween(30000, 150000),
            'job_type' => $this->faker->randomElement(['full-time', 'part-time']),
            'status' => 'open', // default status
        ];
    }
}
