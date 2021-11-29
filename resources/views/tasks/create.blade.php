@extends('layouts.app')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        @lang('Create Task')
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.store', $projectId) }}" method="post">
            @include('tasks._form', [
            'submitBtnName' => 'Create'
            ])
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/js/task/form.js"></script>
@endsection