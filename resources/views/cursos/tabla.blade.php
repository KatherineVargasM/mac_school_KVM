@foreach ($cursos as $curso)
<tr>
    <td><strong>{{ $curso->FCU_COD }}</strong></td>
    <td>{{ $curso->FCU_DESCRI }}</td>
    <td>{{ $curso->FCU_CIC }}</td> 
    <td>
        <button type="button" class="btn btn-sm text-white btn-editar"
                style="background-color: #359637; border-color: #359637;"
                data-bs-toggle="modal" 
                data-bs-target="#modalEditarCurso"
                data-id="{{ $curso->FCU_COD }}"
                data-descripcion="{{ $curso->FCU_DESCRI }}"
                data-ciclo="{{ $curso->FCU_CIC }}">
            Editar
        </button>

        <form action="{{ route('cursos.destroy', $curso->FCU_COD) }}" method="POST" class="form-eliminar" style="display:inline;">
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