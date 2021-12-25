<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TaskExport implements FromView
{
    public function view(): View
    {
        return view('tasks.export', [
            'tasks' => Task::with(['status', 'category', 'developers', 'reviewers'])->get(),
        ]);
    }
}
