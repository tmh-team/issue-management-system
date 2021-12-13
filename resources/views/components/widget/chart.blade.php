<div {{ $attributes->merge(['class' => 'col-sm-6']) }}>
    <div class="card mb-4 text-white {{ $bgColor }}">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start tw-h-36">
            <div>
                <div class="fs-4 fw-semibold">{{ $count }}</div>
                <div>{{ $label }}</div>
            </div>
        </div>
    </div>
</div>