<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            MAC School Dashboard
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('asignaturas.index') }}">Asignaturas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ciclos.index') }}">Ciclos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('personal.index') }}">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>