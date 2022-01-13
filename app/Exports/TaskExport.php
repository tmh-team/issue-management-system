<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TaskExport implements FromView
{
    protected $view;

    public function __construct(string $view)
    {
        $this->view = $view;
    }

    public function view(): View
    {
        $tasks = Task::with('project', 'status', 'category', 'developers', 'reviewers')
            ->filter(request(['search', 'filter']))
            ->sort()
            ->paginate(config('contants.pagination_limit'));

        return view($this->view, compact('tasks'));
    }
}
