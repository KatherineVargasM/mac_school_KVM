<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Alumno - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Actualizar Alumno: {{ $alumno->ALUM_NOMBRES }}</h1>
        
        <form action="{{ route('alumnos.update', $alumno->ALUM_NMATRI) }}" method="post">
            
            @csrf 
            @method('PUT') <div class="row mb-3">
                <label for="txt_nombre" class="col-sm-3 col-form-label">NOMBRE COMPLETO</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" maxlength="100" value="{{ old('txt_nombre', $alumno->ALUM_NOMBRES) }}" required>
                    @error('txt_nombre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="sel_curso" class="col-sm-3 col-form-label">CURSO</label>
                <div class="col-sm-9">
                    <select class="form-control" name="sel_curso" id="sel_curso" required>
                        <option value="">Seleccione un curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->FCU_COD }}" 
                                {{ old('sel_curso', $alumno->ALUM_CODCUR) == $curso->FCU_COD ? 'selected' : '' }}>
                                {{ $curso->FCU_DESCRI }}
                            </option>
                        @endforeach
                    </select>
                    @error('sel_curso') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="form-group row mt-4">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cerrar</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>