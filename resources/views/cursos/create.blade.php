<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Ingresar Nuevo Curso</h1>
        
        <form action="{{ route('cursos.store') }}" method="post">
            @csrf

            <div class="row mb-3">
                <label for="txt_descripcion" class="col-sm-3 col-form-label">DESCRIPCIÓN</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_descripcion" id="txt_descripcion" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="sel_ciclo" class="col-sm-3 col-form-label">CICLO</label>
                <div class="col-sm-9">
                    <select class="form-control" name="sel_ciclo" id="sel_ciclo" required>
                        <option value="">Seleccione un ciclo</option>
                        @foreach ($ciclos as $ciclo)
                            <option value="{{ $ciclo->CIC_CODI }}">{{ $ciclo->CIC_NOMB }} ({{ $ciclo->CIC_OBSERV }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
      
            <div class="form-group row mt-4">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cerrar</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>