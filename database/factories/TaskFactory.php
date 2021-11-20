<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $projectId = Project::inRandomOrder()->first();

        return [
            'project_id' => $projectId,
            'issue_no' => rand(1, 0) ? rand(1000, 9999) : null,
            'pull_no' => rand(1, 0) ? rand(1000, 9999) : null,
            'summary' => rand(1, 0) ? $this->faker->text(25) : null,
            'detail' => rand(1, 0) ? $this->faker->text(25) : null,
            'task_status_id' => TaskStatus::inRandomOrder()->where('project_id', $projectId)->first(),
            'start_date' => now()->subDays(rand(1, 3)),
            'end_date' => rand(0, 1) ? now() : null,
            'remarks' => rand(1, 0) ? $this->faker->text(25) : null,
        ];
    }
}
