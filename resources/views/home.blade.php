@extends('layouts.app')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="navbar-nav">
        <a href="/home" class="nav-item nav-link"> Home </a>
        <a href="/medicos" class="nav-item nav-link"> Médicos </a>
        <a href="/pacientes" class="nav-item nav-link"> Pacientes </a>
        <a href="/consulta" class="nav-item nav-link"> Consultas </a>
        <a href="/relatorios/listamedicosconsultas" class="nav-item nav-link"> Relatórios Médicos</a>
        <a href="/relatorios/listapacientesconsultas" class="nav-item nav-link"> Relatórios Pacientes</a>
    </div>
</nav>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection