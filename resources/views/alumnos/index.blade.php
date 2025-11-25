<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Alumnos - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="alert alert-light">
            <h2 class="text-primary">Gestión de Alumnos</h2>
            
            <a href="{{ route('alumnos.create') }}" class="btn btn-success">Nuevo</a>
            <button type="button" class="btn btn-success">Reporte</button> 
            <a href="{{ url('/admin') }}" class="btn btn-secondary">← Volver al Panel Principal</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <div id="contenedor_tabla" class="table-responsive">
            <table id="tabla" name="tabla" class="table table-bordered table-hover">
                <thead class='bg-primary text-light text-center'>
                    <tr>
                        <th>N° MATRÍCULA</th>
                        <th>NOMBRE COMPLETO</th>
                        <th>CURSO ASIGNADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->ALUM_NMATRI }}</td>
                        <td>{{ $alumno->ALUM_NOMBRES }}</td>
                        <td>{{ $alumno->curso->FCU_DESCRI }}</td> 
                        <td class="text-center">
                            <a href="{{ route('alumnos.edit', $alumno->ALUM_NMATRI) }}" class="btn btn-warning btn-sm">Editar</a>
    
                            <form action="{{ route('alumnos.destroy', $alumno->ALUM_NMATRI) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar matrícula de {{ $alumno->ALUM_NOMBRES }}?');">
                            Eliminar
                            </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>