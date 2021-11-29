@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Edit Task Status')
    </div>
    <div class="card-body">
        <form action="{{ route('statuses.update', [$projectId, $status->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">@lang('Status')</label>
                <input name="status" class="form-control" type="text" value="{{ old('status', $status->status) }}">
                @error('status')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">@lang('Update')</button>
                <a href="{{ route('statuses.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
            </div>
        </form>
    </div>
</div>
@endsection