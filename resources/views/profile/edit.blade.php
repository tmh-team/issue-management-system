@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Edit Profile') }}
    </div>
    <div class="card-body">
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')

            @csrf

            <x-input.text class="mb-3" label="Name" name="name" value="{{ Auth::user()->name }}" />
            <x-input.text class="mb-3" label="Email" name="email" type="email" value="{{ Auth::user()->email }}" />
            <x-input.text class="mb-3" label="Phone No" name="phone" value="{{ Auth::user()->profile->phone ?? '' }}" />
            <x-input.text class="mb-3" label="Address" name="address" value="{{ Auth::user()->profile->address ?? '' }}" />
            <x-input.text type="date" class="mb-3" label="Joined At" name="joined_at" value="{{ Auth::user()->profile->joined_at ?? '' }}" />
            <x-input.text type="date" class="mb-3" label="Resigned At" name="resigned_at" value="{{ Auth::user()->profile->resigned_at ?? '' }}" />
            <!-- profile photo upload -->
            @include('profile._profile_photo_upload')

            <div class="tw-flex tw-justify-between tw-items-center">
                <x-btn.submit>Update</x-btn.submit>
                <x-btn.back url="{{ route('profile.index') }}" />
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ version('/js/profile/preview-img.js') }}"></script>
@endsection
