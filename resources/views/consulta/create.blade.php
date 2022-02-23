@extends('layouts.layoutpadrao')
@section('titulo')
Cadastrar uma nova consulta
@endsection

@section('conteudo')

<form action="{{route('consulta.store')}}" method="POST" class="form-horizontal">
    @csrf
    <div class="form-group">
        <label>Data consulta:</label>
        <input type="text" name="dt_consulta" class="form-control" value="{{old('dt_consulta')}}">
    </div>
    <div class="form-group">
        <label>Hora da consulta:</label>
        <input type="text" name="hr_consulta" class="form-control" value=" {{old('hr_consulta')}}">
    </div>
    <div class="form-group">
        <label>Convenio:</label>
        <input type="text" name="convenio" class="form-control" value="{{old('convenio')}}">
    </div>
    <div class="form-group">
        <label>Valor:</label>
        <input type="text" name="valor" class="form-control" value="{{old('valor')}}">
    </div>
    <div class="form-group">
        <label>Médicos :</label>
        <select name="medicos_id" class="form-control">
            <option>---------SELECIONE---------</option>
            @foreach($medicos as $medico)
            <option value="{{$medico->id}}">{{$medico->nome}}</option>
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
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <strong> Atenção!! </strong>
    Consulta não cadastrada devido aos seguintes erros:
    <ul>
        @foreach($errors->all() as $erro)
        <li> {{$erro}} </li>
        @endforeach
    </ul>
</div>
@endif
@endsection