@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Edit Task Status')
    </div>
    <div class="card-body">
        <form action="{{ route('statuses.update', [$projectId, $status->id]) }}" method="post">
            @method('PUT')

            @include('task_statuses._form', [
                'submitBtnName' => 'Update'
            ])
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/js/common/color.js"></script>
@endsection