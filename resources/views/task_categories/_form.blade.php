<div class="mb-3">
    <label class="form-label">@lang('Name')</label>
    <input name="name" class="form-control" type="text" value="{{ old('name', $category->name) }}">
    @error('name')
        <p class="text-danger text-xs">{{ $message }}</p>  
    @enderror
</div>
<div class="row mb-3">
    <div class="col-md-1">
        <label class="form-label">@lang('Color')</label>
        <input class="form-control" type="color" id="color" style="height: 38px" value="{{ old('color', $category->color) }}" oninput="getColorValue()">
    </div>
    <div class="col-md-1" style="width: 120px">
        <label class="form-label">@lang('Hex:')</label>
        <input name="color" class="form-control" type="text" id="color-code" maxlength="7" value="{{ old('color', $category->color) }}" oninput="changeColorValue(this)">
        @error('color')
            <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary">{{ $submitBtnName }}</button>
    <a href="{{ route('categories.index', $projectId) }}" class="btn btn-outline-secondary">@lang('Back')</a>
</div>