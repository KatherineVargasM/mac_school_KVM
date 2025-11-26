@foreach ($alumnos as $alumno)
<tr>
    <td><strong>{{ $alumno->ALUM_NMATRI }}</strong></td>
    <td>{{ $alumno->ALUM_NOMBRES }}</td>
    <td>{{ $alumno->curso->FCU_DESCRI }}</td> 
    <td>
        <button type="button" class="btn btn-sm text-white btn-editar"
                style="background-color: #359637; border-color: #359637;"
                data-bs-toggle="modal" 
                data-bs-target="#modalEditarAlumno"
                data-id="{{ $alumno->ALUM_NMATRI }}"
                data-nombre="{{ $alumno->ALUM_NOMBRES }}"
                data-curso="{{ $alumno->ALUM_CODCUR }}">
            Editar
        </button>

        <form action="{{ route('alumnos.destroy', $alumno->ALUM_NMATRI) }}" method="POST" class="form-eliminar" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm text-white" 
                    style="background-color: #008B8B; border-color: #008B8B;">
            Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach