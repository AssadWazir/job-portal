<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Application;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Users
        $admin = User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@jobportal.com',
        ]);

        $employers = User::factory(5)->create(['role' => 'employer']);
        $candidates = User::factory(20)->create(['role' => 'candidate']);

        // 2️⃣ Categories
        $categories = Category::factory(5)->create();

        // 3️⃣ Skills
        $skills = Skill::factory(10)->create();

        // 4️⃣ Companies
        $companies = $employers->map(fn($user) => Company::factory()->create([
            'user_id' => $user->id,
        ]));

        // 5️⃣ Jobs
        $jobs = collect();

        foreach ($companies as $company) {
            $companyJobs = Job::factory(5)->create([
                'company_id' => $company->id,
                'category_id' => $categories->random()->id,
            ]);

            // Attach 2–4 random skills for each job
            $companyJobs->each(fn($job) =>
                $job->skills()->attach($skills->random(rand(2,4))->pluck('id')->toArray())
            );

            $jobs = $jobs->merge($companyJobs);
        }

        // 6️⃣ Applications
        foreach ($candidates as $candidate) {
            $appliedJobs = $jobs->random(rand(1,3));

            foreach ($appliedJobs as $job) {
                Application::factory()->create([
                    'user_id' => $candidate->id,
                    'job_id' => $job->id,
                ]);
            }
        }
    }
}
