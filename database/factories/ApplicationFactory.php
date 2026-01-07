<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'job_id' => Job::factory(),
            'resume' => $this->faker->filePath(), // fake file path
            'cover_letter' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
