@extends('layouts.app')

@section('content')
<x-list-header createUrl="{{ route('categories.create', $projectId) }}" />

{{--
<x-flash.success-alert />
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="{{ route('categories.create', $projectId) }}" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div> --}}

<div class="card mb-4">
    <div class="card-header">
        @lang('Categories')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col" style="width: 170px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <th scope="row"> {{ $category->id }} </th>
                    <td>
                        <span class="tw-bg-gray-300 tw-p-2 tw-rounded-2xl tw-text-sm"
                            data-bg-color="{{ $category->color }}">
                            {{ $category->name }}
                        </span>
                    </td>
                    <td>
                        <div class="tw-flex tw-items-center">
                            <x-btn.edit class="tw-mr-2" url="{{ route('categories.edit', [$projectId, $category->id]) }}" />
                            <x-btn.delete url="{{ route('categories.destroy', [$projectId, $category->id]) }}" />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">There is no category.</td>
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

@section('script')
<script src="{{ version('/js/common/bg-color.js') }}"></script>
@endsection