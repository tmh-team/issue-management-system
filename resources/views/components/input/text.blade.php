<div {{ $attributes }}>
    <label class="form-label">@lang($label)</label>
    <input type="text" name="{{ $name }}" class="form-control"
        value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}">
    @error($name)
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>