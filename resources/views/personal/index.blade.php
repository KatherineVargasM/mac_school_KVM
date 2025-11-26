@extends('layouts.dashboard_full')

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestión Escolar /</span> Personal
    </h4>

    <div class="card">
        <h5 class="card-header">Gestión de Personal</h5>
        
        <div class="card-body">
            
            <div class="mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevoPersonal">
                    Nuevo Personal
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 col-md-5">
                 <input type="text" class="form-control" id="txt_buscar" name="txt_buscar" placeholder="Buscar por nombre o cédula...">
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>APELLIDOS Y NOMBRES</th>
                            <th>CÉDULA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="tabla_resultados">
                        @include('personal.tabla')
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalNuevoPersonal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('personal.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="txt_nombre" class="form-label">Apellidos y Nombres</label>
                                <input type="text" id="txt_nombre" name="txt_nombre" class="form-control" placeholder="Ingrese nombre completo..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-0">
                                <label for="txt_cedula" class="form-label">Cédula</label>
                                <input type="text" id="txt_cedula" name="txt_cedula" class="form-control" placeholder="Ingrese cédula..." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditarPersonal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditarPersonal" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="edit_txt_nombre" class="form-label">Apellidos y Nombres</label>
                                <input type="text" id="edit_txt_nombre" name="txt_nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-0">
                                <label for="edit_txt_cedula" class="form-label">Cédula</label>
                                <input type="text" id="edit_txt_cedula" name="txt_cedula" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#txt_buscar').on('keyup', function(){
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('personal.index') }}",
                    type: "GET",
                    data: {'txt_buscar': query},
                    success: function(data){
                        $('#tabla_resultados').html(data);
                    }
                });
            });

            $(document).on('click', '.btn-editar', function() {
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');
                var cedula = $(this).data('cedula');

                $('#edit_txt_nombre').val(nombre);
                $('#edit_txt_cedula').val(cedula);

                var actionUrl = "{{ route('personal.update', ':id') }}";
                actionUrl = actionUrl.replace(':id', id);
                $('#formEditarPersonal').attr('action', actionUrl);
            });
        });
    </script>
@endsection