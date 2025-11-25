<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Personal - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Actualizar Personal: {{ $persona->PER_APENOM }}</h1>
        
        <form action="{{ route('personal.update', $persona->PER_CODIGO) }}" method="post">
            
            @csrf 
            @method('PUT') <div class="row mb-3">
                <label for="txt_nombre" class="col-sm-3 col-form-label">APELLIDOS Y NOMBRES</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" maxlength="80" value="{{ old('txt_nombre', $persona->PER_APENOM) }}" required>
                    @error('txt_nombre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="txt_cedula" class="col-sm-3 col-form-label">CÉDULA</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_cedula" id="txt_cedula" maxlength="16" value="{{ old('txt_cedula', $persona->PER_CEDULA) }}" required>
                    @error('txt_cedula') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="form-group row mt-4">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <a href="{{ route('personal.index') }}" class="btn btn-secondary">Cerrar</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>