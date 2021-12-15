<div class="tw-grid tw-grid-cols-4 tw-gap-3">
    <div>
        <label class="form-label">@lang('Photo')</label>
        <input type="file" name="photo" class="form-control mb-3"
            onchange="showPreviewImage(event)"
            accept="image/png, image/gif, image/jpeg, image/jpg, image/webp, image/jpeg2000">
        @error('photo')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div>
        @if(Auth::user()->profile->photo)
            <img src="{{ asset('storage/user-photos/'. Auth::user()->profile->photo) }}" 
            id="preview-img" 
            class="tw-w-24 tw-h-24 tw-border-solid tw-border-2 tw-border-gray-200">
        @else
            <img src="{{ asset('images/user.png') }}" alt="" 
            id="preview-img" 
            class="tw-w-24 tw-h-24 tw-border-solid tw-border-2 tw-border-gray-200">
        @endif
    </div>
</div>