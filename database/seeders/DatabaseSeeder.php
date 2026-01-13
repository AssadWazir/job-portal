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
        /*
         * Create admin user
         */
        User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@jobportal.com',
        ]);

        /*
         * Create employers and candidates
         */
        $employers = User::factory()->count(5)->create([
            'role' => 'employer',
        ]);

        $candidates = User::factory()->count(20)->create([
            'role' => 'candidate',
        ]);

        /*
         * Create base data
         */
        $categories = Category::factory()->count(5)->create();
        $skills     = Skill::factory()->count(10)->create();

        /*
         * Create companies for each employer
         */
        $companies = [];

        foreach ($employers as $employer) {
            $companies[] = Company::factory()->create([
                'user_id' => $employer->id,
            ]);
        }

        /*
         * Create jobs for each company
         */
        $jobs = collect();

        foreach ($companies as $company) {
            $companyJobs = Job::factory()
                ->count(5)
                ->create([
                    'company_id'  => $company->id,
                    'category_id' => $categories->random()->id,
                ]);

            foreach ($companyJobs as $job) {
                $jobSkills = $skills->random(rand(2, 4))->pluck('id')->toArray();
                $job->skills()->attach($jobSkills);
            }

            $jobs = $jobs->merge($companyJobs);
        }

        /*
         * Create job applications
         */
        foreach ($candidates as $candidate) {
            $selectedJobs = $jobs->random(rand(1, 3));

            foreach ($selectedJobs as $job) {
                Application::factory()->create([
                    'user_id' => $candidate->id,
                    'job_id'  => $job->id,
                ]);
            }
        }
    }
}
