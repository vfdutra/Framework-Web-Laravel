@extends('layouts.layoutpadrao')
@section('titulo')
Cadastrar um novo paciente
@endsection

@section('conteudo')

<form action="{{route('pacientes.store')}}" method="POST" class="form-horizontal">
    @csrf
    <div class="form-group">
        <label>Nome do Paciente:</label>
        <input type="text" name="nome" class="form-control" value="{{old('nome')}}">
    </div>
    <div class="form-group">
        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control" value=" {{old('cpf')}}">
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone" class="form-control" value="{{old('telefone')}}">
    </div>
    <div class="form-group">
        <label>Endereço:</label>
        <input type="text" name="endereco" class="form-control" value="{{old('endereco')}}">
    </div>
    <div class="form-group">
        <label>Idade:</label>
        <input type="text" name="idade" class="form-control" value="{{old('idade')}}">
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <strong> Atenção!! </strong>
    Paciente não cadastrado devido aos seguintes erros:
    <ul>
        @foreach($errors->all() as $erro)
        <li> {{$erro}} </li>
        @endforeach
    </ul>
</div>
@endif
@endsection