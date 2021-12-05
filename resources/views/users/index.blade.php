@extends('layouts.app')

@section('content')
<x-list-header createUrl="{{ route('users.create') }}" />

<div class="card mb-4">
    <div class="card-header">
        @lang('Users')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Email')</th>
                    <th scope="col">@lang('Project')</th>
                    <th scope="col" style="width: 170px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>
                        <a href="{{ $user->path() }}">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{!! $user->projectsToString() !!}</td>
                    <td>
                        <div class="tw-flex tw-items-center">
                            <x-btn.view class="tw-mr-2" url="{{ route('users.show', $user->id) }}" />
                            <x-btn.edit class="tw-mr-2" url="{{ route('users.edit', $user->id) }}" />
                            <x-btn.delete url="{{ route('users.destroy', $user->id) }}" />
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection