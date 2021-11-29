<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('projects.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Project') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Users') }}
        </a>
    </li>
    @cannot('super-admin')
    <li class="nav-item">
        <a class="nav-link" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Tasks') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Categories') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Statuses') }}
        </a>
    </li>
    @endcannot
</ul>