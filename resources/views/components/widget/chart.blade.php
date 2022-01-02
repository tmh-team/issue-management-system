@props([
    'url' => '#',
    'bgColor',
    'count',
    'label',
    'icon' => false
])

<div {{ $attributes->merge(['class' => 'col-sm-6']) }}>
    <a href="{{ $url }}" class="tw-no-underline">
        <div class="card text-white {{ $bgColor }}">
            <div class="card-body pb-0 tw-flex tw-items-center tw-justify-around tw-h-36">
                <div>
                    <div class="fs-4 fw-semibold">{{ $count }}</div>
                    <div class="tw-text-">{{ $label }}</div>
                </div>
                @if($icon)
                <div>
                    {!! $icon !!}
                </div>
                @endif
            </div>
        </div>
    </a>
</div>