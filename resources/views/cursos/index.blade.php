@extends('layouts.dashboard_full')

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestión Escolar /</span> Cursos
    </h4>

    <div class="card">
        <h5 class="card-header">Gestión de Cursos</h5>
        
        <div class="card-body">
            
            <div class="mb-4">
                <a href="{{ route('cursos.create') }}" class="btn btn-primary">Nuevo Curso</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 col-md-5">
                 <input type="text" class="form-control" id="txt_buscar" name="txt_buscar" placeholder="Buscar por descripción...">
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>DESCRIPCIÓN</th>
                            <th>CICLO</th> 
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="tabla_resultados">
                        @include('cursos.tabla')
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
                    url: "{{ route('cursos.index') }}",
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