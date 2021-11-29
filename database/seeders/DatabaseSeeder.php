<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\TaskDeveloper;
use App\Models\TaskReviewer;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $statuses = Project::STATUSES;

        $categories = [
            'feature',
            'bug',
            'customer',
            'feedback',
        ];

        User::factory()->create([
            'email' => 'admin@test.com',
        ]);
        $projects = Project::factory(10)
            ->has(User::factory(3))
            ->create();

        Issue::factory(10)->create();

        foreach ($projects as $project) {
            // create task statuses
            foreach ($statuses as $status) {
                TaskStatus::create([
                    'project_id' => $project->id,
                    'status' => $status,
                ]);
            }

            // create tasks
            $tasks = Task::factory(10)->create([
                'project_id' => $project->id,
                'task_status_id' => TaskStatus::inRandomOrder()->where('project_id', $project->id)->first(),
            ]);

            // create task developers and reviewers
            foreach ($tasks as $task) {
                TaskDeveloper::create([
                    'task_id' => $task->id,
                    'user_id' => DB::table('project_user')
                        ->where('project_id', $project->id)
                        ->inRandomOrder()
                        ->first()
                        ->id,
                ]);
                TaskReviewer::create([
                    'task_id' => $task->id,
                    'user_id' => DB::table('project_user')
                        ->where('project_id', $project->id)
                        ->inRandomOrder()
                        ->first()
                        ->id,
                ]);
            }

            // create categories
            foreach ($categories as $category) {
                TaskCategory::create([
                    'project_id' => $project->id,
                    'name' => $category,
                ]);
            }
        }
    }
}
