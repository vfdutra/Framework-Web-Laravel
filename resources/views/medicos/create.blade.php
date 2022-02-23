@extends('layouts.layoutpadrao')
@section('titulo')
Cadastrar um novo médico
@endsection

@section('conteudo')

<form action="{{route('medicos.store')}}" method="POST" class="form-horizontal">
    @csrf
    <div class="form-group">
        <label>Nome do Médico:</label>
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
        <label>CRM:</label>
        <input type="text" name="crm" class="form-control" value="{{old('crm')}}">
    </div>
    <div class="form-group">
        <label>Especialidade:</label>
        <input type="text" name="especialidade" class="form-control" value="{{old('especialidade')}}">
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
    Medico não cadastrado devido aos seguintes erros:
    <ul>
        @foreach($errors->all() as $erro)
        <li> {{$erro}} </li>
        @endforeach
    </ul>
</div>
@endif
@endsection