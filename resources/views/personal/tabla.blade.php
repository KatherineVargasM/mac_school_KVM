@foreach ($personal as $p)
<tr>
    <td><strong>{{ $p->PER_CODIGO }}</strong></td>
    <td>{{ $p->PER_APENOM }}</td>
    <td>{{ $p->PER_CEDULA }}</td>
    <td>
        <button type="button" class="btn btn-sm text-white btn-editar"
                style="background-color: #359637; border-color: #359637;"
                data-bs-toggle="modal" 
                data-bs-target="#modalEditarPersonal"
                data-id="{{ $p->PER_CODIGO }}"
                data-nombre="{{ $p->PER_APENOM }}"
                data-cedula="{{ $p->PER_CEDULA }}">
            Editar
        </button>
        
        <form action="{{ route('personal.destroy', $p->PER_CODIGO) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE') 
            <button type="submit" class="btn btn-sm text-white" 
                    style="background-color: #008B8B; border-color: #008B8B;"
                    onclick="return confirm('¿Eliminar a {{ $p->PER_APENOM }}?');">
                Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach