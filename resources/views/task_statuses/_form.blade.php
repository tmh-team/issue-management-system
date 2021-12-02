@csrf

<div class="mb-3">
    <label class="form-label">@lang('Status')</label>
    <input name="status" class="form-control" type="text" value="{{ old('status', $status->status) }}">
    @error('status')
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>

<div class="row mb-3">
    <div class="col-md-1">
        <label class="form-label">@lang('Color')</label>
        <input name="color_box" class="form-control" type="color" style="height: 38px"
            oninput="setValueToColorInput()">
    </div>
    <div class="col-md-1">
        <label class="form-label">@lang('Hex:')</label>
        <input name="color" class="form-control" type="text" maxlength="7" value="{{ old('color', $status->color) }}"
            oninput="setValueToColorBox()">
        @error('color')
        <p class="text-danger text-xs" id="invalid-color">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary">{{ $submitBtnName }}</button>
    <a href="{{ route('statuses.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
</div>