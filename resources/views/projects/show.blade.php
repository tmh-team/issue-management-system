@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Project Detail') }}
    </div>
    <div class="card-body">
        <h3 class="text-center">{{ $project->name }}</h3>
        <div class="row">
            <div class="col-md-12">
                <h5>@lang('Summary')</h3>
                    <p class="text-muted">{{ $project->summary }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h5>@lang('Project Members')</h5>
                <ol class="mt-4">
                    @foreach ($project->users as $user)
                    <li>
                        {{ $user->name }} <small class="text-muted">({{ $user->email }})</small>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-success btn-sm">
            @lang('Edit')
        </a>
        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>
</div>
@endsection