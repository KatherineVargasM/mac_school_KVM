@extends('layouts.dashboard_full') 

@section('content')
    <div class="container text-center mt-5">
        
        <h1 class="display-4">📚<br>Sistema de Evaluación Docente</h1>
        <p class="lead">Bienvenido al sistema KVM.</p>
        <span class="text-muted small">by Katherine Vargas Mena</span>
        <hr class="my-4">

        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Gestión Académica" class="img-fluid shadow-sm" style="max-height: 250px; width: auto; border-radius: 8px;">
    
    </div>
@endsection