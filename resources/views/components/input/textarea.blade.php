<div {{ $attributes }}>
    <label class="form-label">@lang($label)</label>
    <textarea name="{{ $name }}" class="form-control"
        rows="{{ $rows ?? '3' }}" placeholder="{{ $placeholder ?? '' }}">
        {{ $value ?? '' }}
    </textarea>
    @error($name)
    <p class="text-danger text-xs">{{ $message }}</p>
    @enderror
</div>