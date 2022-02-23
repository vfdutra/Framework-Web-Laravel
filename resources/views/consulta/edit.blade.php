@extends('layouts.layoutpadrao')
@section('titulo')
Alterar dados da consulta
@endsection

@section('conteudo')
<form action="{{route('consulta.update',$consulta->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Data consulta:</label>
        <input type="text" name="dt_consulta" class="form-control" value="{{$consulta->dt_consulta}}">
    </div>
    <div class="form-group">
        <label>Hora da consulta:</label>
        <input type="text" name="hr_consulta" class="form-control" value="{{$consulta->hr_consulta}}">
    </div>
    <div class="form-group">
        <label>Convenio:</label>
        <input type="text" name="convenio" class="form-control" value="{{$consulta->convenio}}">
    </div>
    <div class="form-group">
        <label>Valor:</label>
        <input type="text" name="valor" class="form-control" value="{{$consulta->valor}}">
    </div>
    <div class="form-group">
        <label>Médicos :</label>
        <select name="medicos_id" class="form-control">
            <option>---------SELECIONE---------</option>
            @foreach($medicos as $medico)
            <option value=" {{$medico->id}}">{{$medico->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Pacientes :</label>
        <select name="pacientes_id" class="form-control">
            <option>---------SELECIONE---------</option>
            @foreach($pacientes as $paciente)
            <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <strong> Atenção!! </strong>
    Consulta não editada devido aos seguintes erros:
    <ul>
        @foreach($errors->all() as $erro)
        <li> {{$erro}} </li>
        @endforeach
    </ul>
</div>
@endif
@endsection