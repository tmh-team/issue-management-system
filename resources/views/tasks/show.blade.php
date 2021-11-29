@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">

    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        {{ __('Task') }} # {{ $task->id }}
        <span class="badge me-1 bg-success">Open</span>
    </div>
    <div class="card-body">
        <h3>@lang('Summary')</h3>
        <x-hr />
        <p>{{ $task->summary }}</p>

        <h3>@lang('Detail')</h3>
        <x-hr />
        <p>{{ $task->detail }}</p>

        <x-hr />

        <p>@lang('Github Issue No.'): {{ $task->issue_no }}</p>
        <p>@lang('Github Pull Request No.'): {{ $task->pull_no }}</p>
        <p>@lang('Status'): {{ $task->status?->status }}</p>
        <p>@lang('Category'): {{ $task->category?->name }}</p>
        <p>@lang('Assgined to'): {{ $task->developersToString() }}</p>
        <p>@lang('Reviewer'): {{ $task->reviewersToString() }}</p>
        <p>@lang('Start Date'): {{ $task?->start_date->toDateString() }}</p>
        <p>@lang('End Date'): {{ $task?->end_date?->toDateString() }}</p>

    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('tasks.edit', [$projectId, $task->id]) }}" class="btn btn-success btn-sm">
            @lang('Edit')
        </a>
        <a href="{{ route('tasks.index', [$projectId, $task->id]) }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>
</div>
@endsection