@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('tasks.index', $projectId) }}" class="btn btn-outline-secondary">Back</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        {{ __('Task Detail') }}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <p>{{ $taskDetail }}</p>
            </div>
        </div>
    </div>
</div>
@endsection