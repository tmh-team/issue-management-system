@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Edit Project') }}
    </div>
    <div class="card-body">
        <form action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('PUT')

            @include('projects._form', [
            'submitBtnName' => 'Update'
            ])
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/js/project/form.js"></script>
@endsection