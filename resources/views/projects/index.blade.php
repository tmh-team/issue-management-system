@extends('layouts.app')

@section('content')
<x-flash.success-alert/>
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        {{ __('Project List') }}
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col" style="width: 350px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->name }}</td>
                    <td>
                        <div>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('issues.index', $project->id) }}" class="btn btn-info btn-sm">
                                @lang('Issues')
                                </a>
                                <a href="{{ route('users.index', ['project_id' => $project->id]) }}"
                                    class="btn btn-warning btn-sm">
                                    @lang('Members')
                                </a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-success btn-sm">
                                    @lang('Edit')
                                </a>
                                 <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">
                                    @lang('Detail')
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure want to delete?')">
                                    @lang('Delete')
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection