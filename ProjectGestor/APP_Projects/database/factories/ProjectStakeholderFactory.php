<?php

namespace Database\Factories;
use App\Models\ProjectStakeholder;
use App\Models\Project;
use App\Models\Stakeholder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectStakeholderFactory extends Factory
{
    protected $model = ProjectStakeholder::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'stakeholder_id' => Stakeholder::factory(),
            'engagement_level' => $this->faker->randomElement(['Consulted', 'Involved', 'Partnered']),
            'impact_assessment' => $this->faker->paragraph,
        ];
    }
}
