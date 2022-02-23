@extends('layouts.layoutpadrao')
@section('titulo')
Alterar dados do paciente
@endsection

@section('conteudo')
<form action="{{route('pacientes.update',$pacientes->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nome do Paciente:</label>
        <input type="text" name="nome" class="form-control" value="{{$pacientes->nome}}">
    </div>
    <div class=" form-group">
        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control" value="{{$pacientes->cpf}}">
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="text" name="email" class="form-control" value="{{$pacientes->email}}">
    </div>
    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone" class="form-control" value="{{$pacientes->telefone}}">
    </div>
    <div class="form-group">
        <label>Endereço:</label>
        <input type="text" name="endereco" class="form-control" value="{{$pacientes->endereco}}">
    </div>
    <div class="form-group">
        <label>Idade:</label>
        <input type="text" name="idade" class="form-control" value="{{$pacientes->idade}}">
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary">Alterado</button>
    </div>
</form>
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <strong> Atenção!! </strong>
    Paciente não alterado devido aos seguintes erros:
    <ul>
        @foreach($errors->all() as $erro)
        <li> {{$erro}} </li>
        @endforeach
    </ul>
</div>
@endif
@endsection