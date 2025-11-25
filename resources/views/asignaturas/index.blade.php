@extends('layouts.dashboard_full') // Usa el layout de barra lateral

@section('content') 

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestión Escolar /</span> Asignaturas
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Listado de Asignaturas</h5>
        </div>
        
        <div class="card-body">
            
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <a href="{{ route('asignaturas.create') }}" class="btn btn-primary">Nuevo</a>
                <button type="button" class="btn btn-secondary">Reporte</button> 
            </div>

            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="col-md-5 mb-3">
                 <input type="text" class="form-control" id="txt_buscar" name="txt_buscar" placeholder="Buscar por nombre o código">
            </div>

            <div id="contenedor_tabla" class="table-responsive text-nowrap">
                <table id="tabla" name="tabla" class="table table-bordered table-hover">
                    <thead class='bg-primary text-white text-center' style="font-weight: bold;">
                        <tr>
                            <th>CÓDIGO</th>
                            <th>ASIGNATURAS</th> <th>OBSERVACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asignaturas as $asignatura)
                        <tr>
                            <td>{{ $asignatura->ASIG_CODIGO }}</td>
                            <td>{{ $asignatura->ASIG_NOMBRE }}</td>
                            <td>{{ $asignatura->ASIG_OBSERV }}</td>
                            <td class="text-center">
                                <a href="{{ route('asignaturas.edit', $asignatura->ASIG_CODIGO) }}" class="btn btn-warning btn-sm">Editar</a>
                                
                                <form action="{{ route('asignaturas.destroy', $asignatura->ASIG_CODIGO) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar la asignatura {{ $asignatura->ASIG_NOMBRE }}?');">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection