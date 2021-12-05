@csrf
<x-input.text class="mb-3" label="Name" name="name" value="{{ $user->name }}" />
@if (request()->routeIs('users.create'))
<x-input.text class="mb-3" label="Email" name="email" type="email" value="{{ $user->name }}" />
<x-input.text class="mb-3" label="Password" name="password" value="password" />
@endif

<div class="tw-flex tw-justify-between tw-items-center">
    <x-btn.submit>{{ $submitBtnName }}</x-btn.submit>
    <x-btn.back url="{{ route('users.index') }}" />
</div>