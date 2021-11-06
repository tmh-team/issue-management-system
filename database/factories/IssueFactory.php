<?php

namespace Database\Factories;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::inRandomOrder()->first(),
            'issue_no' => '#' . rand(0000, 9999),
            'pr_no' => '#' . rand(0000, 9999),
            'status' => Issue::STATUS['in_progress'],
            'start_date' => now(),
            'end_date' => null,
            'title' => $this->faker->text(100),
            'body' => $this->faker->text(),
            'developer_id' => User::inRandomOrder()->first(),
            'reviewer_id' => User::inRandomOrder()->first(),
        ];
    }
}
