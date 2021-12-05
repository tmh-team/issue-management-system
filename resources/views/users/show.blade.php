@extends('layouts.app')

@section('content')
<div class="tw-flex tw-justify-between tw-items-center mb-3">
    <div class="tw-flex">
        <x-btn.edit class="tw-mr-2" url="{{ route('users.edit', $user->id) }}" />
        <x-btn.delete url="{{ route('users.destroy', $user->id) }}" />
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        @lang('User Details')
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <x-card.item label="Name" value="{{ $user->name }}" />
            <x-card.item label="Email" value="{{ $user->email }}" />
            <x-card.item label="Created At" value="{{ $user->created_at->toFormattedDateString() }}" />
            <x-card.item label="Projects" value="{!! $user->projectsToString() !!}" />
        </ul>
    </div>
</div>
@endsection