@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('developers.create', [$projectId, $taskId]) }}" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        @lang('Developer List')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Task ID')</th>
                    <th scope="col">@lang('User ID')</th>
                    <th scope="col" style="width: 300px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($developers as $developer)
                <tr>
                    <th scope="row">{{ $developer->id }}</th>
                    <td>{{ $developer->task_id }}</td>
                    <td>{{ $developer->user_id }}</td>
                    <td>
                        <div>
                            <form action="{{ route('developers.destroy', [$projectId, $taskId, $developer->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                
                                <a href="#" class="btn btn-success btn-sm">
                                    @lang('Edit')
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    @lang('Delete')
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $developers->links() }}
        </div>
    </div>
</div>
@endsection