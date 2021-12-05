@csrf

<x-input.text class="mb-3" label="Status" name="status" value="{{ $status->status }}" />

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">@lang('Color')</label>
        <input name="color_box" class="form-control" type="color" style="height: 38px"
            oninput="setValueToColorInput()">
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Hex:')</label>
        <input name="color" class="form-control" type="text" maxlength="7" value="{{ old('color', $status->color) }}"
            oninput="setValueToColorBox()">
        @error('color')
        <p class="text-danger text-xs" id="invalid-color">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="tw-flex tw-justify-between tw-items-center">
    <x-btn.submit>{{ $submitBtnName }}</x-btn.submit>
    <x-btn.back url="{{ route('statuses.index', $projectId) }}" />
</div>