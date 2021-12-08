<div class="container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb my-0 ms-2">
         @if(isset($breadcrumbs))
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb['url'] && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb['title'] }}</li>
                @endif
            @endforeach
        @endif
    </ol>
    </nav>
</div>
