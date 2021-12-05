@csrf
<x-input.text class="mb-3" label="Name" name="name" value="{{ $project->name }}" />

<div class="mb-3">
    <label class="form-label">@lang('Project Users')</label>
    <select class="form-select js-select-multiple-users" name="user_ids[]" multiple>
        @foreach ($users as $user)
        <option value="{{ $user->id }}"
            @if($selectedUsers->contains($user->id)) selected @endif>
            {{ $user->name }}
        </option>
        @endforeach
    </select>
</div>

<x-input.textarea
    class="mb-3"
    label="Summary"
    name="summary"
    value="{{ $project->summary }}" />

<div class="tw-flex tw-justify-between tw-items-center">
    <x-btn.submit>{{ $submitBtnName }}</x-btn.submit>
    <x-btn.back url="{{ route('projects.index') }}" />
</div>