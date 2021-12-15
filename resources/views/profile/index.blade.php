@extends('layouts.app')

@section('content')
<div class="tw-flex tw-justify-between tw-items-center mb-3">
    <div class="tw-flex">
        <x-btn.edit class="tw-mr-2" url="{{ route('profile.edit', Auth::user()->id) }}" />
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        @lang('User Profile')
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <x-card.item-photo label="Photo" value="{{ Auth::user()->profile->photo }}" />
            <x-card.item label="Name" value="{{ Auth::user()->name }}" />
            <x-card.item label="Email" value="{{ Auth::user()->email }}" />
            <x-card.item label="Phone No" value="{{ Auth::user()->profile->phone ?? '' }}" />
            <x-card.item label="Address" value="{{ Auth::user()->profile->address ?? '' }}" />
            <x-card.item label="Joined At" value="{{ Auth::user()->profile->joined_at ?? '' }}" />
            <x-card.item label="Created At" value="{{ Auth::user()->created_at->toFormattedDateString() }}" />
            <x-card.item label="Projects" value="{!! Auth::user()->projectsToString() !!}" />
        </ul>
    </div>
</div>
@endsection