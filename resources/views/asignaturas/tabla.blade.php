@foreach ($asignaturas as $asignatura)
<tr>
    <td><strong>{{ $asignatura->ASIG_CODIGO }}</strong></td>
    <td>{{ $asignatura->ASIG_NOMBRE }}</td>
    <td>{{ $asignatura->ASIG_OBSERV }}</td>
    <td>
        <a href="{{ route('asignaturas.edit', $asignatura->ASIG_CODIGO) }}" 
           class="btn btn-sm text-white"
           style="background-color: #359637; border-color: #359637;">
            Editar
        </a>
        
        <form action="{{ route('asignaturas.destroy', $asignatura->ASIG_CODIGO) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm text-white" 
                    style="background-color: #008B8B; border-color: #008B8B;"
                    onclick="return confirm('¿Estás seguro de que deseas eliminar la asignatura {{ $asignatura->ASIG_NOMBRE }}?');">
                Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach