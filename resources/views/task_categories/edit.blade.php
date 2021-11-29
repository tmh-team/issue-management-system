@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Edit Task Category')
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', [$projectId, $category->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">@lang('Name')</label>
                <input name="name" class="form-control" type="text" value="{{ old('name', $category->name) }}">
                @error('name')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">@lang('Update')</button>
                <a href="{{ route('categories.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
            </div>
        </form>
    </div>
</div>
@endsection