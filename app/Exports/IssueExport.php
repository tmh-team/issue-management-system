<?php

namespace App\Exports;

use App\Models\Issue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IssueExport implements FromView
{
    public function view(): View
    {
        return view('issues.export', [
            'issues' => Issue::with(['developer', 'reviewer'])->get(),
        ]);
    }
}
