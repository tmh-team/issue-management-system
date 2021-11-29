@extends('layouts.app')

@section('content')
<x-flash.success-alert />
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('statuses.create', $projectId) }}" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        @lang('Task Status List')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Status')</th>
                    <th scope="col" style="width: 300px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($statuses as $status)
                <tr>
                    <th scope="row">
                        {{ ($statuses->currentpage()-1) * $statuses->perpage() + $loop->index + 1 }}
                    </th>
                    <td>{{ $status->status }}</td>
                    <td>
                        <div>
                            <form action="{{ route('statuses.destroy', [$projectId, $status->id]) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('statuses.edit', [$projectId, $status->id]) }}"
                                    class="btn btn-success btn-sm">
                                    @lang('Edit')
                                </a>
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
                    <td colspan="3">There is no task status.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $statuses->links() }}
        </div>
    </div>
</div>
@endsection