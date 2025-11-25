@foreach ($alumnos as $alumno)
<tr>
    <td><strong>{{ $alumno->ALUM_NMATRI }}</strong></td>
    <td>{{ $alumno->ALUM_NOMBRES }}</td>
    <td>{{ $alumno->curso->FCU_DESCRI }}</td> 

    <td>
        <a href="{{ route('alumnos.edit', $alumno->ALUM_NMATRI) }}" 
           class="btn btn-sm text-white"
           style="background-color: #359637; border-color: #359637;">
            Editar
        </a>

        <form action="{{ route('alumnos.destroy', $alumno->ALUM_NMATRI) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm text-white" 
                    style="background-color: #008B8B; border-color: #008B8B;"
                    onclick="return confirm('¿Eliminar matrícula de {{ $alumno->ALUM_NOMBRES }}?');">
            Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach