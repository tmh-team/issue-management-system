@extends('layouts.app')

@section('content')
<x-list-header createUrl="{{ route('tasks.create', $projectId) }}" />

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
                    <th scope="col">@lang('Summary')</th>
                    <th scope="col">@lang('Status')</th>
                    <th scope="col">@lang('Start Date')</th>
                    <th scope="col">@lang('End Date')</th>
                    <th scope="col" style="width: 170px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>
                        <span class="tw-bg-gray-300 tw-p-2 tw-rounded-2xl tw-text-sm"
                            data-bg-color="{{ $task->category?->color }}">
                            {{ $task->category?->name }}
                        </span>
                    <td>{{ $task->issue_no }}</td>
                    <td>
                        <a href="{{ route('tasks.show', [$projectId, $task->id]) }}">{{ Str::limit($task->summary, 10) }}</a>
                    </td>
                    <td>
                        <span class="tw-bg-gray-300 tw-p-2 tw-rounded-2xl tw-text-sm"
                            data-bg-color="{{ $task->status->color }}">
                            {{ $task->status->status }}
                        </span>
                    </td>
                    <td>{{ $task?->start_date?->toFormattedDateString() }}</td>
                    <td>{{ $task?->end_date?->toFormattedDateString() }}</td>
                    <td>
                        <div class="tw-flex tw-items-center">
                            <x-btn.view class="tw-mr-2" url="{{ route('tasks.show', [$projectId, $task->id]) }}" />
                            <x-btn.edit class="tw-mr-2" url="{{ route('tasks.edit', [$projectId, $task->id]) }}" />
                            <x-btn.delete url="{{ route('tasks.destroy', [$projectId, $task->id]) }}" />
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

@section('script')
<script src="{{ version('/js/common/bg-color.js') }}"></script>
@endsection