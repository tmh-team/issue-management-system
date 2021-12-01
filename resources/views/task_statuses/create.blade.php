@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Create Task Status')
    </div>
    <div class="card-body">
        <form action="{{ route('statuses.store', $projectId) }}" method="post">
            @include('task_statuses._form', [
                'submitBtnName' => 'Create'
            ])
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/js/common/color.js"></script>
@endsection