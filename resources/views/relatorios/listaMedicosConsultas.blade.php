@extends('layouts.layoutpadrao')

@section('conteudo')
<form action="{{url('/relatorios/listamedicosconsultas')}}" method="get">
    <label>Escolha o médico</label>
    <select name='id' class="form-control">
        @foreach($medicos as $medico)
        <option value="{{$medico->id}}">{{$medico->nome}}</option>
        @endforeach
    </select>
    <br>
    <input type="submit" name="Pesquisar" value="Pesquisar" class="btn btn-primary">
</form>
<br>
@if($medicoEscolhido!=null)
<table class="table table-striped">
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>CPF</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>CRM</td>
        <td>Especialidade</td>
    </tr>
    <tr>
        <td>{{$medicoEscolhido['id']}}</td>
        <td>{{$medicoEscolhido['nome']}}</td>
        <td>{{$medicoEscolhido['cpf']}}</td>
        <td>{{$medicoEscolhido['email']}}</td>
        <td>{{$medicoEscolhido['telefone']}}</td>
        <td>{{$medicoEscolhido['crm']}}</td>
        <td>{{$medicoEscolhido['especialidade']}}</td>
    </tr>
</table>
@endif
<br>
@if($consulta_medicos!=null)
<h2>Consultas regristradas do médico</h2>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Médico</td>
        <td>Paciente</td>
        <td>Convenio</td>
        <td>Valor</td>
    </tr>
    @foreach($consulta_medicos as $consulta)
    <tr>
        <td>{{$consulta->id}}</td>
        <td>{{$consulta->medicos->nome}}</td>
        <td>{{$consulta->pacientes->nome}}</td>
        <td>{{$consulta->convenio}}</td>
        <td>{{$consulta->valor}}</td>
    </tr>
    @endforeach
</table>
@endif
@endsection