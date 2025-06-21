<?php

namespace Database\Factories;
use App\Models\Stakeholder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stakeholder>
 */
class StakeholderFactory extends Factory
{
    protected $model = Stakeholder::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stakeholderTypes = ['Community', 'Government', 'Investor', 'NGO', 'Employee'];
        return [
            'stakeholder_name' => $this->faker->name,
            'stakeholder_type' => $this->faker->randomElement($stakeholderTypes),
        ];
    }
}
