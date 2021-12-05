@extends('layouts.app')

@section('content')
<x-list-header createUrl="{{ route('statuses.create', $projectId) }}" />

<div class="card mb-4">
    <div class="card-header">
        @lang('Statuses')
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Status')</th>
                    <th scope="col" style="width: 170px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($statuses as $status)
                <tr>
                    <th scope="row"> {{ $status->id }} </th>
                    <td>
                        <span class="tw-bg-gray-300 tw-p-2 tw-rounded-2xl tw-text-sm"
                            data-bg-color="{{ $status->color }}">
                            {{ $status->status }}
                        </span>
                    </td>
                    <td>
                        <div class="tw-flex tw-items-center">
                            <x-btn.edit class="tw-mr-2" url="{{ route('statuses.edit', [$projectId, $status->id]) }}" />
                            <x-btn.delete url="{{ route('statuses.destroy', [$projectId, $status->id]) }}" />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">There is no status.</td>
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

@section('script')
<script src="{{ version('/js/common/bg-color.js') }}"></script>
@endsection