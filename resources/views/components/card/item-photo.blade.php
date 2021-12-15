<li class="list-group-item tw-flex">
    <div class="tw-w-40 text-muted">@lang($label)</div>
    <div>
        @if($value)
            <img src="{{ asset('storage/user-photos/'. $value) }}" 
                class="tw-w-24 tw-h-24 tw-border-solid tw-border-2 tw-border-gray-200">
        @endif
    </div>
</li>