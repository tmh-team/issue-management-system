@extends('layouts.app')

@section('content')
<x-flash.success-alert />

<div class="row mb-3">
    <div class="col-6">
        <a href="{{ route('tasks.create', $projectId) }}" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
    <div class="col-6">
        <form>
            <div class="input-group">
                <input class="form-control" name="search" value="{{ request('search') }}" type="search" placeholder="Search...">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
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
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Category')</th>
                    <th scope="col">@lang('Issue No.')</th>
                    <th scope="col">@lang('Pull No.')</th>
                    <th scope="col">@lang('Summary')</th>
                    <th scope="col">@lang('Status')</th>
                    <th scope="col">@lang('Start Date')</th>
                    <th scope="col">@lang('End Date')</th>
                    <th scope="col" style="width: 250px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->category->name }}</td>
                    <td>{{ $task->issue_no }}</td>
                    <td>{{ $task->pull_no }}</td>
                    <td>
                        <a href="{{ route('tasks.show', [$projectId, $task->id]) }}">{{ Str::limit($task->summary, 10) }}</a>
                    </td>
                    <td>{{ $task->status->status }}</td>
                    <td>{{ $task?->start_date?->toDateString() }}</td>
                    <td>{{ $task?->end_date?->toDateString() }}</td>
                    <td>
                        <div>
                            <form action="{{ route('tasks.destroy', [$projectId, $task->id]) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('tasks.show', [$projectId, $task->id]) }}"
                                    class="btn btn-info btn-sm">
                                    @lang('View')
                                </a>
                                <a href="{{ route('tasks.edit', [$projectId, $task->id]) }}"
                                    class="btn btn-success btn-sm">
                                    @lang('Edit')
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure want to delete?')">
                                    @lang('Delete')
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">There is no task.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection