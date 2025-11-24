<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Asignaturas - Laravel</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }

    </style>
</head>
<body>

    <h1>Gestión de Asignaturas</h1>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Observación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($asignaturas as $asignatura)
        <tr>
            <td>{{ $asignatura->ASIG_CODIGO }}</td>
            <td>{{ $asignatura->ASIG_NOMBRE }}</td>
            <td>{{ $asignatura->ASIG_OBSERV }}</td>
            <td>
                <a href="{{ route('asignaturas.edit', $asignatura->ASIG_CODIGO) }}" class="btn btn-warning btn-sm">Editar</a>
    
                <form action="{{ route('asignaturas.destroy', $asignatura->ASIG_CODIGO) }}" method="POST" style="display:inline;">
                    @csrf
                @method('DELETE') <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta asignatura?');">
                        Eliminar
        </button>
    </form>
</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>