@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Create User') }}
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="post">
            @include('users._form', [
            'submitBtnName' => 'Create'
            ])
        </form>
    </div>
</div>
@endsection