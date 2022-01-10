@extends('layouts.app')

@section('content')
<x-flash.alert />

<div class="row mb-3">
    <div class="col-6">
        <x-btn.export url="{{ route('tasks.my_tasks_export') }}" class="btn-primary tw-ml-2" />
    </div>
</div>

@include('tasks._my_tasks_filter')

<div class="card mt-3 mb-4">
    <div class="card-header tw-flex tw-items-center tw-justify-between">
        <div>
            @lang('Task List')
            <a href="{{ route('tasks.my_tasks', ['filter[view]' => 'develop']) }}"
                class="tw-ml-1 @if(request()->url() . '?filter%5Bview%5D=' . request('filter')['view'] !== route('tasks.my_tasks', ['filter[view]' => 'develop'])) tw-text-gray-400 @endif">@lang('Develop')</a>
            <a href="{{ route('tasks.my_tasks', ['filter[view]' => 'review']) }}"
                class="tw-ml-1 @if(request()->url() . '?filter%5Bview%5D=' . request('filter')['view'] !== route('tasks.my_tasks', ['filter[view]' => 'review'])) tw-text-gray-400 @endif">@lang('Review')</a>
        </div>
        @include('tasks._my_tasks_search')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Project')</th>
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
                    <td>{{ $task->project->name }}</td>
                    <td>
                        <span class="tw-shadow tw-p-2 tw-rounded-2xl tw-text-xs"
                            data-bg-color="{{ $task->category?->color }}">
                            {{ $task->category?->name }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('tasks.show', [$task->project_id, $task->id]) }}">
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
                            <x-btn.view class="tw-mr-2"
                                url="{{ route('tasks.show', [$task->project_id, $task->id]) }}" />
                            <x-btn.edit class="tw-mr-2"
                                url="{{ route('tasks.edit', [$task->project_id, $task->id]) }}" />
                            <x-btn.delete url="{{ route('tasks.destroy', [$task->project_id, $task->id]) }}" />
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
            {{ $tasks->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ version('/js/common/bg-color.js') }}"></script>
@endsection