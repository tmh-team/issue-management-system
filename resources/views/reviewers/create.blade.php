@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Create Reviewers') }}
    </div>
    <div class="card-body">
        <form action="{{ route('reviewers.store', [$projectId, $taskId]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">@lang('Assign To')</label>
                <select class="form-select" name="reviewer_ids[]" multiple>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if(in_array($user->id, $reviewers)) selected @endif>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">@lang('Create')</button>
                <a href="{{ route('reviewers.index', [$projectId, $taskId]) }}" class="btn btn-outline-secondary">@lang('Back')</a>
            </div>
        </form>
    </div>
</div>
@endsection