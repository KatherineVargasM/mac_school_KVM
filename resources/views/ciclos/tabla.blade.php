@foreach ($ciclos as $ciclo)
<tr>
    <td><strong>{{ $ciclo->CIC_CODI }}</strong></td>
    <td>{{ $ciclo->CIC_NOMB }}</td>
    <td>{{ $ciclo->CIC_OBSERV }}</td>
    <td>
        <button type="button" class="btn btn-sm text-white btn-editar"
                style="background-color: #359637; border-color: #359637;"
                data-bs-toggle="modal" 
                data-bs-target="#modalEditarCiclo"
                data-id="{{ $ciclo->CIC_CODI }}"
                data-nombre="{{ $ciclo->CIC_NOMB }}"
                data-observacion="{{ $ciclo->CIC_OBSERV }}">
            Editar
        </button>

        <form action="{{ route('ciclos.destroy', $ciclo->CIC_CODI) }}" method="POST" class="form-eliminar" style="display:inline;">
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