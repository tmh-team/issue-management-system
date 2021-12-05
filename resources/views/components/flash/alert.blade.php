@foreach (['success', 'info', 'warning', 'danger'] as $alert)
@if(session($alert))
<div class="alert alert-{{ $alert }} alert-dismissible fade show" role="alert">
    {{ session($alert) }}
    <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach