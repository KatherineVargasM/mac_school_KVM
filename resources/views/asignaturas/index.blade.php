<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASIGNATURAS - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
<body >
    <div class="container mt-4">
        
        <div class="alert alert-light">
            <h2 class="text-primary">Gestión de Asignaturas</h2>
            
            <a href="{{ route('asignaturas.create') }}" class="btn btn-success">Nuevo</a>
            
            <button type="button" class="btn btn-success">Reporte</button> <a href="{{ url('/admin') }}" class="btn btn-secondary">← Volver al Panel Principal</a>
        </div>
        
        <div class="container alert alert-info col-5">
            <h3>Buscar</h3>
            <div class="row">
                <input type="text" class="form-control col-4" id="txt_buscar" name="txt_buscar" placeholder="Buscar por nombre o código">
            </div>
        </div>
        
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <div id="contenedor_tabla" class="table-responsive">
            <table id="tabla" name="tabla" class="table table-bordered table-hover">
                <thead class='bg-primary text-light text-center'>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>ASIGNATURAS</th> <th>OBSERVACIÓN</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{ $asignatura->ASIG_CODIGO }}</td>
                        <td>{{ $asignatura->ASIG_NOMBRE }}</td>
                        <td>{{ $asignatura->ASIG_OBSERV }}</td>
                        <td class="text-center">
                            <a href="{{ route('asignaturas.edit', $asignatura->ASIG_CODIGO) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('asignaturas.destroy', $asignatura->ASIG_CODIGO) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar la asignatura {{ $asignatura->ASIG_NOMBRE }}?');">
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    </body>
</html>