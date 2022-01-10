@extends('layouts.app')

@section('content')
<div class="tw-flex tw-justify-between tw-items-center mb-3">
    <div>
        <x-btn.default url="{{ route('tasks.index', ['filter[project]' => $project->id]) }}">
            @lang('Tasks')
        </x-btn.default>

        <x-btn.default class="tw-ml-2" url="{{ route('statuses.index', $project->id) }}">
            @lang('Statuses')
        </x-btn.default>

        <x-btn.default class="tw-ml-2" url="{{ route('categories.index', $project->id) }}">
            @lang('Categories')
        </x-btn.default>

        <x-btn.default class="tw-ml-2" url="{{ route('users.index', ['project_id' => $project->id]) }}">
            @lang('Members')
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
                @foreach ($project->users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>
                        <a href="{{ $user->path() }}">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection