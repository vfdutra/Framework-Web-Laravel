@extends('layouts.layoutpadrao')
@section('titulo')
Alterar dados do médico
@endsection

@section('conteudo')
<form action="{{route('medicos.update',$medicos->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nome do Médico:</label>
        <input type="text" name="nome" class="form-control" value="{{$medicos->nome}}">
    </div>
    <div class="form-group">
        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control" value="{{$medicos->cpf}}">
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="text" name="email" class="form-control" value="{{$medicos->email}}">
    </div>
    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone" class="form-control" value="{{$medicos->telefone}}">
    </div>
    <div class="form-group">
        <label>CRM:</label>
        <input type="text" name="crm" class="form-control" value="{{$medicos->crm}}">
    </div>
    <div class="form-group">
        <label>Especialidade:</label>
        <input type="text" name="especialidade" class="form-control" value="{{$medicos->especialidade}}">
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
    Médico não alterado devido aos seguintes erros:
    <ul>
        @foreach($errors->all() as $erro)
        <li> {{$erro}} </li>
        @endforeach
    </ul>
</div>
@endif
@endsection