@extends('layouts.dashboard_full')

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestión Escolar /</span> Cursos
    </h4>

    <div class="card">
        <h5 class="card-header">Gestión de Cursos</h5>
        
        <div class="card-body">
            
            <div class="mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevoCurso">
                    Nuevo Curso
                </button>
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

    <div class="modal fade" id="modalNuevoCurso" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Nuevo Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('cursos.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="txt_descripcion" class="form-label">Descripción del Curso</label>
                                <input type="text" id="txt_descripcion" name="txt_descripcion" class="form-control" placeholder="Ej: Primero A" required>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="sel_ciclo" class="form-label">Ciclo Académico</label>
                                <select class="form-select" id="sel_ciclo" name="sel_ciclo" required>
                                    <option value="">Seleccione un ciclo...</option>
                                    @foreach($ciclos as $ciclo)
                                        <option value="{{ $ciclo->CIC_CODI }}">{{ $ciclo->CIC_NOMB }}</option>
                                    @endforeach
                                </select>
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

    <div class="modal fade" id="modalEditarCurso" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditarCurso" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="edit_txt_descripcion" class="form-label">Descripción del Curso</label>
                                <input type="text" id="edit_txt_descripcion" name="txt_descripcion" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="edit_sel_ciclo" class="form-label">Ciclo Académico</label>
                                <select class="form-select" id="edit_sel_ciclo" name="sel_ciclo" required>
                                    <option value="">Seleccione un ciclo...</option>
                                    @foreach($ciclos as $ciclo)
                                        <option value="{{ $ciclo->CIC_CODI }}">{{ $ciclo->CIC_NOMB }}</option>
                                    @endforeach
                                </select>
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
                    url: "{{ route('cursos.index') }}",
                    type: "GET",
                    data: {'txt_buscar': query},
                    success: function(data){
                        $('#tabla_resultados').html(data);
                    }
                });
            });

            $(document).on('click', '.btn-editar', function() {
                var id = $(this).data('id');
                var descripcion = $(this).data('descripcion');
                var ciclo = $(this).data('ciclo');

                $('#edit_txt_descripcion').val(descripcion);
                $('#edit_sel_ciclo').val(ciclo);

                var actionUrl = "{{ route('cursos.update', ':id') }}";
                actionUrl = actionUrl.replace(':id', id);
                $('#formEditarCurso').attr('action', actionUrl);
            });
        });
    </script>
@endsection