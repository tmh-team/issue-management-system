@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Edit Task Category')
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', [$projectId, $category->id]) }}" method="post">
            @method('PUT')

            @include('task_categories._form', [
            'submitBtnName' => 'Update'
            ])
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="/js/helper/color.js"></script>
@endsection