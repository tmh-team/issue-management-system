@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Create Task')
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.update', [$projectId, $task->id]) }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">@lang('Issue No.')</label>
                <input name="issue_no" class="form-control" type="number"
                    value="{{ old('issue_no', $task->issue_no) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Pull No.')</label>
                <input name="pull_no" class="form-control" type="number" value={{ old('pull_no', $task->pull_no) }}>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Start Date')</label>
                <input name="start_date" class="form-control" type="date" value={{ old('start_date', $task->start_date)
                }}>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('End Date')</label>
                <input name="end_date" class="form-control" type="date" value={{ old('end_date', $task->end_date) }}>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Status')</label>
                <select class="form-select" name="task_status_id">
                    <option selected>-- @lang('Select Status') --</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" @if($status->id === $task->task_status_id) selected @endif>
                        {{ $status->status }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Assign To')</label>
                <select class="form-select" name="developer_ids[]" multiple>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if(in_array($user->id, $developers)) selected @endif>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Reviewers')</label>
                <select class="form-select" name="reviewer_ids[]" multiple>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if(in_array($user->id, $reviewers)) selected @endif>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Summary')</label>
                <input name="summary" class="form-control" type="text" value="{{ old('summary', $task->summary) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Detail')</label>
                <textarea name="detail" class="form-control" rows="3">{{ old('detail', $task->detail) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Remarks')</label>
                <textarea name="remarks" class="form-control" rows="3">{{ old('remarks', $task->remarks) }}</textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">@lang('Update')</button>
                <a href="{{ route('issues.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
            </div>
        </form>
    </div>
</div>
@endsection