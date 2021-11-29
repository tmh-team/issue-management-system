@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Edit Task')
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.update', [$projectId, $task->id]) }}" method="post">
            @method('PUT')

            @include('tasks._form', [
            'submitBtnName' => 'Update'
            ])
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/js/task/form.js"></script>
@endsection