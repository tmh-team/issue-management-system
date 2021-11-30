@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Create Task Status')
    </div>
    <div class="card-body">
        <form action="{{ route('statuses.store', $projectId) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">@lang('Status')</label>
                <input name="status" class="form-control" type="text">
                @error('status')
                <p class="text-danger text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-1">
                    <label class="form-label">@lang('Color')</label>
                    <input class="form-control" type="color" style="height: 38px" oninput="getColorValue()">
                </div>
                <div class="col-md-1">
                    <label class="form-label">@lang('Hex:')</label>
                    <input name="color" class="form-control" type="text" maxlength="7" oninput="changeColorValue(this)">
                    @error('color')
                    <p class="text-danger text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">@lang('Create')</button>
                <a href="{{ route('statuses.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/js/task_status/color.js"></script>
@endsection