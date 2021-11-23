@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('tasks.create', $projectId) }}" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        @lang('Task List')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Project ID')</th>
                    <th scope="col">@lang('Issue No.')</th>
                    <th scope="col">@lang('Pull No.')</th>
                    <th scope="col">@lang('Summary')</th>
                    <th scope="col">@lang('Detail')</th>
                    <th scope="col">@lang('Status')</th>
                    <th scope="col">@lang('Start Date')</th>
                    <th scope="col">@lang('End Date')</th>
                    <th scope="col">@lang('Remarks')</th>
                    <th scope="col" style="width: 300px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @inject('carbon', '\Carbon\Carbon')
                @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->project_id }}</td>
                    <td>{{ $task->issue_no }}</td>
                    <td>{{ $task->pull_no }}</td>
                    <td>{{ $task->summary }}</td>
                    <td>{{ $task->detail }}</td>
                    <td>{{ $task->task_status_id }}</td>
                    <td>{{ $carbon::parse($task->start_date)->format('Y-m-d') }}</td>
                    <td>{{ $carbon::parse($task->end_date)->format('Y-m-d') }}</td>
                    <td>{{ $task->remarks }}</td>
                    <td>
                        <div>
                            <form action="{{ route('tasks.destroy', [$projectId, $task->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                
                                <a href="{{ route('developers.index', [$projectId, $task->id]) }}" class="btn btn-info btn-sm">@lang('Developers')</a>
                                <a href="{{ route('reviewers.index', [$projectId, $task->id]) }}" class="btn btn-warning btn-sm">@lang('Reviewers')</a>
                                <a href="{{ route('tasks.edit', [$projectId, $task->id]) }}" class="btn btn-success btn-sm">
                                    @lang('Edit')
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    @lang('Delete')
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection