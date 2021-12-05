@extends('layouts.app')

@section('content')
<div class="tw-flex tw-justify-between tw-items-center mb-3">
    <div>
    </div>
    <div class="tw-flex">
        <x-btn.edit class="tw-mr-2" url="{{ route('tasks.edit', [$projectId, $task->id]) }}" />
        <x-btn.delete url="{{ route('tasks.destroy', [$projectId, $task->id]) }}" />
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        @lang('Task Details')
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <x-card.item label="ID" value="{{ $task->id }}" />
            <x-card.item label="Project" value="{{ $task->project->name }}" />
            <x-card.item label="Issue No." value="{{ $task->issue_no }}" />
            <x-card.item label="Pull Request No." value="{{ $task->pull_no }}" />
            <x-card.item label="Summary" value="{{ $task->summary }}" />
            <x-card.item label="Detail" value="{{ $task->detail }}" />
            <x-card.item label="Status">
                <span class="tw-bg-gray-300 tw-p-2 tw-rounded-2xl tw-text-sm"
                    data-bg-color="{{ $task->status?->color }}">
                    {{ $task->status?->status }}
                </span>
            </x-card.item>
            <x-card.item label="Category">
                <span class="tw-bg-gray-300 tw-p-2 tw-rounded-2xl tw-text-sm"
                    data-bg-color="{{ $task->category?->color }}">
                    {{ $task->category?->name }}
                </span>
            </x-card.item>
            <x-card.item label="Developers" value="{!! $task->developersToString() !!}" />
            <x-card.item label="Reviewers" value="{!! $task->reviewersToString() !!}" />
            <x-card.item label="Start Date" value="{{ $task->start_date?->toFormattedDateString() }}" />
            <x-card.item label="End Date" value="{{ $task->end_date?->toFormattedDateString() }}" />
            <x-card.item label="Remark" value="{{ $task->remark }}" />
        </ul>
    </div>
</div>
@endsection

@section('script')
<script src="{{ version('/js/common/bg-color.js') }}"></script>
@endsection