<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de Asignatura - Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
<body>
    <div class="container mt-5">
        
        <h1>Actualizar Asignatura: {{ $asignatura->ASIG_NOMBRE }}</h1>
        
        <form action="{{ route('asignaturas.update', $asignatura->ASIG_CODIGO) }}" method="post">
            
            @csrf 
            
            @method('PUT') 

            <input type="hidden" id="txt_codigo" name="txt_codigo" value="{{ $asignatura->ASIG_CODIGO }}"> 
            
            <div class="row mb-3">
                <label for="txt_nombre" class="col-sm-3 col-form-label">NOMBRE</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" maxlength="20" value="{{ $asignatura->ASIG_NOMBRE }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="txt_observacion" class="col-sm-3 col-form-label">OBSERVACIÓN</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_observacion" id="txt_observacion" maxlength="50" value="{{ $asignatura->ASIG_OBSERV }}" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <a href="{{ url('/asignaturas') }}" class="btn btn-secondary">Cerrar</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>