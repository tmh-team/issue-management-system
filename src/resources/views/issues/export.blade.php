<table>
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('Issue No.')</th>
            <th>@lang('PR No.')</th>
            <th>@lang('Start Date')</th>
            <th>@lang('End Date')</th>
            <th>@lang('Status')</th>
            <th>@lang('Summary')</th>
            <th>@lang('Detail')</th>
            <th>@lang('Developer')</th>
            <th>@lang('Reviewer')</th>
            <th>@lang('Remarks')</th>
            <th>@lang('Issue/PR URL')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($issues as $issue)
        <tr>
            <td>{{ $issue->id }}</td>
            <td>{{ $issue->issue_no }}</td>
            <td>{{ $issue->pr_no }}</td>
            <td>{{ $issue->start_date?->format('Y-m-d') }}</td>
            <td>{{ $issue->end_date?->format('Y-m-d') }}</td>
            <td>{{ $issue->getStatus() }}</td>
            <td>{{ $issue->summary }}</td>
            <td>{{ $issue->detail }}</td>
            <td>{{ $issue->developer->name }}</td>
            <td>{{ $issue->reviewer->name }}</td>
            <td>{{ $issue->remarks }}</td>
            <td>{{ $issue->getGithubLink() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>