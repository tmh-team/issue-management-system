@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Dashboard') }}
    </div>
    <div class="card-body">
        <div class="row">
            <x-widget.chart class="col-lg-6" count="{{ $projectCount }}" label="Projects" bgColor="bg-primary" />
            <x-widget.chart class="col-lg-6" count="{{ $userCount }}" label="Users" bgColor="bg-info" />
        </div>
    </div>
</div>
@endsection