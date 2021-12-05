@csrf

<x-input.text class="mb-3" label="Name" name="name" value="{{ $category->name }}" />

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">@lang('Color')</label>
        <input class="form-control" type="color" id="color" style="height: 38px" value="{{ old('color', $category->color) }}" oninput="getColorValue()">
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Hex:')</label>
        <input name="color" class="form-control" type="text" id="color-code" maxlength="7" value="{{ old('color', $category->color) }}" oninput="changeColorValue(this)">
        @error('color')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="tw-flex tw-justify-between tw-items-center">
    <x-btn.submit>{{ $submitBtnName }}</x-btn.submit>
    <x-btn.back url="{{ route('categories.index', $projectId) }}" />
</div>