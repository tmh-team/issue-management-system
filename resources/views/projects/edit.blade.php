@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Edit Project') }}
    </div>
    <div class="card-body">
        <form action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">@lang('Project Name')</label>
                <input type="text" name="name" class="form-control" value="{{ $project->name }}">
                @error('name')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Project Users')</label>
                <select class="form-select" name="user_ids[]" multiple>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        @if(in_array($user->id, $selectedUsers)) selected @endif>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('Summery')</label>
                <textarea name="summary" class="form-control" rows="3">{{ $project->summary }}</textarea>
                @error('summary')
                    <p class="text-danger text-xs">{{ $message }}</p>  
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection