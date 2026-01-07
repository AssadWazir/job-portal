<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company,
            'logo' => null,
            'description' => $this->faker->paragraph,
            'website' => $this->faker->url,
        ];
    }
}
