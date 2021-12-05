@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Create Task Category')
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store', $projectId) }}" method="post">
            @include('task_categories._form', [
            'submitBtnName' => 'Create'
            ])
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="/js/helper/color.js"></script>
@endsection