<div {{ $attributes->merge(['class' => 'col-sm-6']) }}>
    <div class="card text-white {{ $bgColor }}">
        <div class="card-body pb-0 tw-flex tw-items-center tw-justify-around tw-h-36">
            <div>
                <div class="fs-4 fw-semibold">{{ $count }}</div>
                <div>{{ $label }}</div>
            </div>
            @isset($icon)
            <div>
                {!! $icon !!}
            </div>
            @endisset
        </div>
    </div>
</div>