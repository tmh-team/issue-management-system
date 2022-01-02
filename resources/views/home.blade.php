@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <x-widget.chart
                :url="route('projects.index')"
                class="col-lg-4"
                count="{{ $projectCount }}"
                label="Projects"
                bgColor="bg-primary">
                <x-slot name="icon">
                    <svg class="tw-h-16 tw-w-16">
                        <use xlink:href="http://task-management-system.test/icons/coreui.svg#cil-notes"></use>
                    </svg>
                </x-slot>
            </x-widget.chart>

            <x-widget.chart
                :url="route('users.index')"
                class="col-lg-4"
                count="{{ $userCount }}"
                label="Users"
                bgColor="bg-info">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-16 tw-w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </x-slot>
            </x-widget.chart>

            {{-- <x-widget.chart
                class="col-lg-4"
                count="{{ $taskCount }}"
                label="Tasks"
                bgColor="bg-warning">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-16 tw-w-16" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                    </svg>
                </x-slot>
            </x-widget.chart> --}}
        </div>
    </div>
</div>
@endsection