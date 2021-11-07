@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Create Issue') }}
    </div>
    <div class="card-body">
        <form action="{{ route('issues.store', $projectId) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">@lang('Issue No.')</label>
                <input name="issue_no" class="form-control" type="number">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('PR No.')</label>
                <input name="pr_no" class="form-control" type="number">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Start Date')</label>
                <input name="start_date" class="form-control" type="date">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('End Date')</label>
                <input name="end_date" class="form-control" type="date">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Status')</label>
                <select class="form-select" name="status">
                    <option selected>-- @lang('Select Status') --</option>
                    @foreach ($statuses as $value => $name)
                    <option value="{{ $value }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Assign To')</label>
                <select class="form-select" name="developer_id">
                    <option selected>-- @lang('Select Status') --</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Reviewer')</label>
                <select class="form-select" name="reviewer_id">
                    <option selected>-- @lang('Select Status') --</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Summary')</label>
                <input name="summary" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Detail')</label>
                <textarea name="detail" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Remark')</label>
                <textarea name="remarks" class="form-control" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('issues.index', $projectId) }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection