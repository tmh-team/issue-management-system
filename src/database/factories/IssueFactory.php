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
        $key = array_rand(Issue::STATUS);

        return [
            'project_id' => Project::inRandomOrder()->first(),
            'issue_no' => rand(1, 0) ? '#' . rand(1000, 9999) : null,
            'pr_no' => rand(1, 0) ? '#' . rand(1000, 9999) : null,
            'status' => Issue::STATUS[$key],
            'start_date' => now()->subDays(rand(1, 3)),
            'end_date' => rand(0, 1) ? now() : null,
            'summary' => $this->faker->text(100),
            'detail' => $this->faker->text(),
            'developer_id' => User::inRandomOrder()->first(),
            'reviewer_id' => User::inRandomOrder()->first(),
        ];
    }
}
