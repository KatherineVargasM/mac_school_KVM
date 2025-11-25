@foreach ($cursos as $curso)
<tr>
    <td><strong>{{ $curso->FCU_COD }}</strong></td>
    <td>{{ $curso->FCU_DESCRI }}</td>
    <td>{{ $curso->FCU_CIC }}</td> 
    <td>
        <a href="{{ route('cursos.edit', $curso->FCU_COD) }}" 
           class="btn btn-sm text-white"
           style="background-color: #359637; border-color: #359637;">
            Editar
        </a>

        <form action="{{ route('cursos.destroy', $curso->FCU_COD) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm text-white" 
                    style="background-color: #008B8B; border-color: #008B8B;"
                    onclick="return confirm('¿Estás seguro de eliminar el curso {{ $curso->FCU_DESCRI }}?');">
            Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach