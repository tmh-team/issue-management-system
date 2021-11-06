@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-6 offset-6 text-end">
        <a href="#" class="btn btn-primary btn-sm">@lang('Create')</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        {{ __('Issue List') }}
    </div>
    <div class="card-body">


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('Issue No.')</th>
                    <th scope="col">@lang('PR No.')</th>
                    <th scope="col">@lang('Start Date')</th>
                    <th scope="col">@lang('End Date')</th>
                    <th scope="col">@lang('Title')</th>
                    <th scope="col" style="width: 300px;">@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                <tr>
                    <th scope="row">{{ $issue->id }}</th>
                    <td>{{ $issue->issue_no }}</td>
                    <td>{{ $issue->pr_no }}</td>
                    <td>{{ $issue->start_date?->toFormattedDateString() }}</td>
                    <td>{{ $issue->end_date?->toFormattedDateString() }}</td>
                    <td>{{ Str::limit($issue->title, 20) }}</td>
                    <td>
                        <div>
                            <a href="#" class="btn btn-info btn-sm">
                                @lang('Issues')
                            </a>
                            <a href="#" class="btn btn-success btn-sm">
                                @lang('Edit')
                            </a>
                            <a href="#" class="btn btn-danger btn-sm">
                                @lang('Delete')
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection