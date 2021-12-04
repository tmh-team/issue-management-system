@extends('layouts.app')

@section('content')
<x-flash.success-alert />
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('categories.create', $projectId) }}" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        @lang('Task Category List')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Color Code')</th>
                    <th scope="col">@lang('Color')</th>
                    <th scope="col" style="width: 300px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <th scope="row">
                        {{ ($categories->currentpage()-1) * $categories->perpage() + $loop->index + 1 }}
                    </th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->color }}</td>
                    <td><div class="p-3 mb-2" style="width: 10px; background-color: {{$category->color}}"></div></td>
                    <td>
                        <div>
                            <form action="{{ route('categories.destroy', [$projectId, $category->id]) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('categories.edit', [$projectId, $category->id]) }}"
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
                    <td colspan="3">There is no task category.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection