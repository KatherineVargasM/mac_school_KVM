<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Ciclo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Ingresar Nuevo Ciclo</h1>
        
        <form action="{{ route('ciclos.store') }}" method="post">
            @csrf

            <div class="row mb-3">
                <label for="txt_nombre" class="col-sm-3 col-form-label">NOMBRE</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" maxlength="50" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="txt_observacion" class="col-sm-3 col-form-label">OBSERVACIÓN</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_observacion" id="txt_observacion" maxlength="50">
                </div>
            </div>
      
            <div class="form-group row mt-4">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('ciclos.index') }}" class="btn btn-secondary">Cerrar</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>