<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>@lang('Project')</th>
            <th>@lang('Category')</th>
            <th>@lang('Summary')</th>
            <th>@lang('Status')</th>
            <th>@lang('Start Date')</th>
            <th>@lang('End Date')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->project->name }}</td>
            <td>{{ $task->category?->name }}</td>
            <td>{{ $task->summary }}</td>
            <td>{{ $task->status?->status }}</td>
            <td>{{ $task->start_date?->toFormattedDateString() }}</td>
            <td>{{ $task->end_date?->toFormattedDateString() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>