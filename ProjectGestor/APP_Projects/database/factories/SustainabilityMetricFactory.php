<?php

namespace Database\Factories;
use App\Models\SustainabilityMetric;
use App\Models\SustainabilityCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SustainabilityMetric>
 */
class SustainabilityMetricFactory extends Factory
{
    protected $model = SustainabilityMetric::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = SustainabilityCategory::all(); // Get all categories
        if ($categories->isEmpty()) {
            // Handle case where there are no categories (e.g., create one)
            $category = SustainabilityCategory::factory()->create();
        } else {
            $category = $categories->random(); // Choose a random category
        }


        $metrics = [
            'Resource Efficiency' => ['Energy Consumption (kWh)', 'Water Usage (Liters)', 'Waste Generation (kg)'],
            'Social Equity' => ['Number of Jobs Created', 'Community Engagement Score', 'Fair Wages (%)'],
            'Economic Viability' => ['Return on Investment (%)', 'Project Revenue ($)', 'Long-term Economic Impact'],
            'Environmental Protection' => ['Greenhouse Gas Emissions (tons)', 'Biodiversity Impact', 'Pollution Levels'],
            'Community Engagement' => ['Number of Participants', 'Feedback Score', 'Community Satisfaction'],
        ];

        $categoryName = $category->category_name;
        $availableMetrics = $metrics[$categoryName] ?? ['Generic Metric']; //Provide a default if none found
        $metricName = $this->faker->randomElement($availableMetrics);

        // Extract unit of measure (you might want a more sophisticated approach)
        preg_match('/\((.*?)\)/', $metricName, $matches); //Regular expression to get the unit of measure
        $unit = $matches[1] ?? null;
        return [
            'category_id' => $category->id,
            'metric_name' =>  $metricName,
            'unit_of_measure' => $unit,
        ];
    }
}
