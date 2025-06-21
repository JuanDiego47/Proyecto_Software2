<?php

namespace Database\Factories;
use App\Models\SustainabilityCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SustainabilityCategory>
 */
class SustainabilityCategoryFactory extends Factory
{   protected $model = SustainabilityCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Resource Efficiency',
            'Social Equity',
            'Economic Viability',
            'Environmental Protection',
            'Community Engagement',
            // Add more categories as needed
        ];
        return [
            'category_name' => $this->faker->randomElement($categories),
        ];
    }
}
