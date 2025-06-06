<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Stakeholder;
use App\Models\SustainabilityCategory;
use App\Models\SustainabilityMetric;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create(); // Initialize Faker here (once)

        // 1. Seed Sustainability Categories
        if (SustainabilityCategory::count() === 0) { // Prevent duplicates
            SustainabilityCategory::factory(5)->create(); // Adjust number as needed
        }
        $categories = SustainabilityCategory::all();

        // 2. Seed Stakeholders
        if (Stakeholder::count() === 0) { // Prevent duplicates
            Stakeholder::factory(10)->create(); // Adjust number as needed
        }
        $stakeholders = Stakeholder::all();

        // 3. Seed Sustainability Metrics (associated with categories)
        if (SustainabilityMetric::count() === 0) {
          foreach ($categories as $category) {
            SustainabilityMetric::factory(rand(2, 4))->create(['category_id' => $category->id]);
          }
        }
        $metrics = SustainabilityMetric::all();


        // 4. Seed Projects (and attach metrics and stakeholders)
        Project::factory(10)->create()->each(function ($project) use ($faker, $metrics, $stakeholders) {

            // Attach Metrics
            $numMetrics = rand(2, 2);
            $selectedMetrics = $metrics->random($numMetrics); // Use random() on the collection

            foreach ($selectedMetrics as $metric) {
                $project->metrics()->attach($metric->id, [
                    'metric_value' => $faker->randomFloat(2, 0, 100),
                    'date_measured' => $faker->date(),
                ]);
            }

            // Attach Stakeholders
            $numStakeholders = rand(2, 5);
            $selectedStakeholders = $stakeholders->random($numStakeholders);

            foreach ($selectedStakeholders as $stakeholder) {
                $project->stakeholders()->attach($stakeholder->id, [
                    'engagement_level' => $faker->randomElement(['Consulted', 'Involved', 'Partnered']),
                    'impact_assessment' => $faker->paragraph,
                ]);
            }
        });
    }
}