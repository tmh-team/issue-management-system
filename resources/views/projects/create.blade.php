@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Create Project') }}
    </div>
    <div class="card-body">
        <form action="{{ route('projects.store') }}" method="post">
            @include('projects._form', [
            'submitBtnName' => 'Create'
            ])
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/js/project/form.js"></script>
@endsection