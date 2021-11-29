@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('tasks.index', $projectId) }}" class="btn btn-outline-secondary">Back</a>
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
                @forelse ($developers as $developer)
                <tr>
                    <th scope="row">{{ $developer->id }}</th>
                    <td>{{ $developer->task_id }}</td>
                    <td>{{ $developer->user_id }}</td>
                    <td>
                        <div>
                            <form action="{{ route('developers.destroy', [$projectId, $taskId, $developer->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure want to delete?')">
                                    @lang('Delete')
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">There is no developers.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $developers->links() }}
        </div>
    </div>
</div>
@endsection