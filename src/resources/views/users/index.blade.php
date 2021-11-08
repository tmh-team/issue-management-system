@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="#" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        {{ __('user List') }}
    </div>
    <div class="card-body">


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Email')</th>
                    <th scope="col" style="width: 300px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">
                                @lang('Edit')
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-danger btn-sm">
                                @lang('Delete')
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection