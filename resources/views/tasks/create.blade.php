@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Create Task')
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.store', $projectId) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">@lang('Issue No.')</label>
                <input name="issue_no" class="form-control" type="number">
                @error('issue_no')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Pull No.')</label>
                <input name="pull_no" class="form-control" type="number">
                @error('pull_no')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Start Date')</label>
                <input name="start_date" class="form-control" type="date">
                @error('start_date')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('End Date')</label>
                <input name="end_date" class="form-control" type="date">
                @error('end_date')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Status')</label>
                <select class="form-select" name="task_status_id">
                    <option value="" selected>-- @lang('Select Status') --</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                    @endforeach
                </select>
                @error('task_status_id')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Assign To')</label>
                <select class="form-select" name="developer_ids[]" multiple>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('developer_ids')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Reviewers')</label>
                <select class="form-select" name="reviewer_ids[]" multiple>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('reviewer_ids')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Summary')</label>
                <input name="summary" class="form-control" type="text">
                @error('summary')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Detail')</label>
                <textarea name="detail" class="form-control" rows="3"></textarea>
                @error('detail')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Remarks')</label>
                <textarea name="remarks" class="form-control" rows="3"></textarea>
                @error('remarks')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">@lang('Create')</button>
                <a href="{{ route('issues.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
            </div>
        </form>
    </div>
</div>
@endsection