@extends('layouts.app')

@section('content')
<x-flash.alert />

<div class="row mb-3">
    <div class="col-6">
        <x-btn.create url="{{ route('tasks.create', ['filter[project]' => $projectId]) }}" />
        <x-btn.export url="{{ route('tasks.export', $projectId) }}" class="tw-ml-2"/>
    </div>
</div>

@include('tasks._filter')

<div class="card mt-3 mb-4">
    <div class="card-header tw-flex tw-items-center tw-justify-between">
        @lang('Task List')

        <x-input.search />
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Category')</th>
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
                        <span class="tw-shadow tw-p-2 tw-rounded-2xl tw-text-xs"
                            data-bg-color="{{ $task->category?->color }}">
                            {{ $task->category?->name }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('tasks.show', [$projectId, $task->id]) }}">
                            {{ Str::limit($task->summary, 10) }}
                        </a>
                    </td>
                    <td>
                        <span class="tw-shadow tw-p-2 tw-rounded-2xl tw-text-xs"
                            data-bg-color="{{ $task->status->color }}">
                            {{ $task->status->status }}
                        </span>
                    </td>
                    <td>{{ $task->start_date?->toDateString() }}</td>
                    <td>{{ $task->end_date?->toDateString() }}</td>
                    <td>
                        <div class="tw-flex tw-items-center">
                            <x-btn.view class="tw-mr-2" url="{{ route('tasks.show', [$task->id, 'filter[project]' => $projectId]) }}" />
                            <x-btn.edit class="tw-mr-2" url="{{ route('tasks.edit', [$task->id, 'filter[project]' => $projectId]) }}" />
                            <x-btn.delete url="{{ route('tasks.destroy', [$task->id, 'filter[project]' => $projectId]) }}" />
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