@extends('layouts.dashboard_full')

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestión Escolar /</span> Asignaturas
    </h4>

    <div class="card">
        <h5 class="card-header">Lista de Asignaturas</h5>
        
        <div class="card-body">
            
            <div class="mb-4">
                <a href="{{ route('asignaturas.create') }}" class="btn btn-primary">Nueva Asignatura</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 col-md-5">
                 <input type="text" class="form-control" id="txt_buscar" name="txt_buscar" placeholder="Buscar por nombre o código...">
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>ASIGNATURA</th>
                            <th>OBSERVACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="tabla_resultados">
                        @include('asignaturas.tabla')
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#txt_buscar').on('keyup', function(){
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('asignaturas.index') }}",
                    type: "GET",
                    data: {'txt_buscar': query},
                    success: function(data){
                        $('#tabla_resultados').html(data);
                    }
                });
            });
        });
    </script>
@endsection