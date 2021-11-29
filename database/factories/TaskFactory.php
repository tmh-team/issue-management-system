<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\TaskCategory;
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
            'issue_no' => rand(0, 1) ? rand(1000, 9999) : null,
            'pull_no' => rand(0, 1) ? rand(1000, 9999) : null,
            'summary' => $this->faker->text(25),
            'detail' => rand(0, 1) ? $this->faker->text(200) : null,
            'task_status_id' => TaskStatus::inRandomOrder()->where('project_id', $projectId)->first(),
            'task_category_id' => TaskCategory::inRandomOrder()->where('project_id', $projectId)->first(),
            'start_date' => now()->subDays(rand(1, 3)),
            'end_date' => rand(0, 1) ? now()->toDateTimeString() : null,
            'remarks' => rand(0, 1) ? $this->faker->text(25) : null,
            'closed' => rand(0, 1) ? now()->toDateTimeString() : null,
        ];
    }
}
