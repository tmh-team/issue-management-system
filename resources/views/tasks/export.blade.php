<table>
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('Project ID')</th>
            <th>@lang('Issue No')</th>
            <th>@lang('Pull No')</th>
            <th>@lang('Summary')</th>
            <th>@lang('Detail')</th>
            <th>@lang('Status')</th>
            <th>@lang('Category')</th>
            <th>@lang('Start Date')</th>
            <th>@lang('End Date')</th>
            <th>@lang('Remarks')</th>
            <th>@lang('Closed')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->project_id }}</td>
            <td>{{ $task->issue_no }}</td>
            <td>{{ $task->pull_no }}</td>
            <td>{{ $task->summary }}</td>
            <td>{{ $task->detail }}</td>
            <td>{{ $task->status?->status }}</td>
            <td>{{ $task->category?->name }}</td>
            <td>{{ $task->start_date?->toFormattedDateString() }}</td>
            <td>{{ $task->end_date?->toFormattedDateString() }}</td>
            <td>{{ $task->remarks }}</td>
            <td>{{ $task->closed }}</td>
        </tr>
        @endforeach
    </tbody>
</table>