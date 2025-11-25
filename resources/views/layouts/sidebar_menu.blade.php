<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1">...</svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Menú</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Módulos</span></li>
        
        <li class="menu-item {{ Request::is('alumnos*') ? 'active' : '' }}">
            <a href="{{ route('alumnos.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Alumnos">Alumnos</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('personal*') ? 'active' : '' }}">
            <a href="{{ route('personal.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Personal">Personal</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('asignaturas*') ? 'active' : '' }}">
            <a href="{{ route('asignaturas.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Asignaturas">Asignaturas</div>
            </a>
        </li>
        
        <li class="menu-item {{ Request::is('cursos*') ? 'active' : '' }}">
            <a href="{{ route('cursos.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Cursos">Cursos</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('ciclos*') ? 'active' : '' }}">
            <a href="{{ route('ciclos.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
                <div data-i18n="Ciclos">Ciclos</div>
            </a>
        </li>
        
    </ul>
</aside>