@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Edit User') }}
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">@lang('User Name')</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('User Email')</label>
                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection