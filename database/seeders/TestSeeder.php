<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\Models\Profile;
use App\Models\Project;
use App\Models\TaskStatus;
use App\Models\TaskCategory;
use App\Models\TaskReviewer;
use App\Models\TaskDeveloper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email' => 'admin@test.com',
        ]);

        Profile::factory()->create([
            'user_id' => $user->id
        ]);

        $projects = Project::factory(10)
            ->has(User::factory(5))
            ->create();

        foreach ($projects as $project) {
            // create task statuses
            TaskStatus::insert(TaskStatus::getDefaultStatuses($project));
            // create categories
            TaskCategory::insert(TaskCategory::getDefaultCategories($project));

            // create tasks
            $tasks = Task::factory(10)->create([
                'project_id' => $project->id,
                'task_status_id' => TaskStatus::inRandomOrder()->where('project_id', $project->id)->first(),
                'task_category_id' => TaskCategory::inRandomOrder()->where('project_id', $project->id)->first(),
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
        }
    }
}
