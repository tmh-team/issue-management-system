@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Create Project') }}
    </div>
    <div class="card-body">
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">@lang('Project Name')</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Project Members')</label>
                <select class="form-select" name="user_ids[]" multiple>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Summery')</label>
                <textarea name="summary" class="form-control" rows="3"></textarea>
                @error('summary')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection