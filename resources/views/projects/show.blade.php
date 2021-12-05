@extends('layouts.app')

@section('content')
<div class="tw-flex tw-justify-between tw-items-center mb-3">
    <div>
        <x-btn.default url="{{ route('tasks.index', $project->id) }}">
            @lang('Task')
        </x-btn.default>
    </div>
    <div class="tw-flex">
        <x-btn.edit class="tw-mr-2" url="{{ route('projects.edit', $project->id) }}" />
        <x-btn.delete url="{{ route('projects.destroy', $project->id) }}" />
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        @lang('Project Details')
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <x-card.item label="Name" value="{{ $project->name }}" />
            <x-card.item label="Summary" value="{{ $project->summary }}" />
        </ul>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        @lang('Members')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Email')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->users as $users)
                <tr>
                    <th scope="row">{{ $users->id }}</th>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection