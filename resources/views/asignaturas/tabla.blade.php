@foreach ($asignaturas as $asignatura)
<tr>
    <td><strong>{{ $asignatura->ASIG_CODIGO }}</strong></td>
    <td>{{ $asignatura->ASIG_NOMBRE }}</td>
    <td>{{ $asignatura->ASIG_OBSERV }}</td>
    <td>
        <button type="button" class="btn btn-sm text-white btn-editar"
                style="background-color: #359637; border-color: #359637;"
                data-bs-toggle="modal" 
                data-bs-target="#modalEditarAsignatura"
                data-id="{{ $asignatura->ASIG_CODIGO }}"
                data-nombre="{{ $asignatura->ASIG_NOMBRE }}"
                data-observacion="{{ $asignatura->ASIG_OBSERV }}">
            Editar
        </button>
        
        <form action="{{ route('asignaturas.destroy', $asignatura->ASIG_CODIGO) }}" method="POST" class="form-eliminar" style="display:inline;">
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