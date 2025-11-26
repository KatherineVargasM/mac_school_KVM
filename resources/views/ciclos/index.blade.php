@extends('layouts.dashboard_full')

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestión Escolar /</span> Ciclos
    </h4>

    <div class="card">
        <h5 class="card-header">Gestión de Ciclos o Educación</h5>
        
        <div class="card-body">
            
            <div class="mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevoCiclo">
                    Nuevo Ciclo
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 col-md-5">
                 <input type="text" class="form-control" id="txt_buscar" name="txt_buscar" placeholder="Buscar ciclo...">
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE</th>
                            <th>OBSERVACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="tabla_resultados">
                        @include('ciclos.tabla')
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalNuevoCiclo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Nuevo Ciclo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ciclos.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="txt_nombre" class="form-label">Nombre del Ciclo</label>
                                <input type="text" id="txt_nombre" name="txt_nombre" class="form-control" placeholder="Ej: Primaria 2024" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-0">
                                <label for="txt_observacion" class="form-label">Observación</label>
                                <input type="text" id="txt_observacion" name="txt_observacion" class="form-control" placeholder="Opcional...">
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

    <div class="modal fade" id="modalEditarCiclo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Ciclo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditarCiclo" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="edit_txt_nombre" class="form-label">Nombre del Ciclo</label>
                                <input type="text" id="edit_txt_nombre" name="txt_nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-0">
                                <label for="edit_txt_observacion" class="form-label">Observación</label>
                                <input type="text" id="edit_txt_observacion" name="txt_observacion" class="form-control">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function(){
            $('#txt_buscar').on('keyup', function(){
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('ciclos.index') }}",
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
                var observacion = $(this).data('observacion');

                $('#edit_txt_nombre').val(nombre);
                $('#edit_txt_observacion').val(observacion);

                var actionUrl = "{{ route('ciclos.update', ':id') }}";
                actionUrl = actionUrl.replace(':id', id);
                $('#formEditarCiclo').attr('action', actionUrl);
            });

            $(document).on('submit', '.form-eliminar', function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Deseas eliminarlo?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#008B8B',
                    cancelButtonColor: '#359637',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        });
    </script>
@endsection