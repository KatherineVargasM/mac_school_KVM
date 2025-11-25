@foreach ($ciclos as $ciclo)
<tr>
    <td><strong>{{ $ciclo->CIC_CODI }}</strong></td>
    <td>{{ $ciclo->CIC_NOMB }}</td>
    <td>{{ $ciclo->CIC_OBSERV }}</td>
    <td >
        <a href="{{ route('ciclos.edit', $ciclo->CIC_CODI) }}" 
           class="btn btn-sm text-white"
           style="background-color: #359637; border-color: #359637;">
            Editar
        </a>

        <form action="{{ route('ciclos.destroy', $ciclo->CIC_CODI) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm text-white" 
                    style="background-color: #008B8B; border-color: #008B8B;"
                    onclick="return confirm('¿Estás seguro de eliminar el ciclo {{ $ciclo->CIC_NOMB }}?');">
                Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach