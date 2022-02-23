@extends('layouts.layoutpadrao')
@section('titulo')
Escolha a consulta
@endsection

@section('conteudo')
<form action="{{url('/relatorios/listapacientesconsultas')}}" method="get">
    <label>Escolha o paciente</label>
    <select name='id' class="form-control">
        @foreach($pacientes as $paciente)
        <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
        @endforeach
    </select>
    <br>
    <input type="submit" name="Pesquisar" value="Pesquisar" class="btn btn-primary">
</form>
<br>
@if($pacienteEscolhido!=null)
<table class="table table-striped">
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>CPF</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>Endereco</td>
        <td>Idade</td>
    </tr>
    <tr>
        <td>{{$pacienteEscolhido['id']}}</td>
        <td>{{$pacienteEscolhido['nome']}}</td>
        <td>{{$pacienteEscolhido['cpf']}}</td>
        <td>{{$pacienteEscolhido['email']}}</td>
        <td>{{$pacienteEscolhido['telefone']}}</td>
        <td>{{$pacienteEscolhido['endereco']}}</td>
        <td>{{$pacienteEscolhido['idade']}}</td>
    </tr>
</table>
@endif
<br>
@if($consulta_pacientes!=null)
<h2>Consultas regristradas do paciente</h2>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Paciente</td>
        <td>Médico</td>
        <td>Convenio</td>
        <td>Valor</td>
    </tr>
    @foreach($consulta_pacientes as $consulta)
    <tr>
        <td>{{$consulta->id}}</td>
        <td>{{$consulta->pacientes->nome}}</td>
        <td>{{$consulta->medicos->nome}}</td>
        <td>{{$consulta->convenio}}</td>
        <td>{{$consulta->valor}}</td>
    </tr>
    @endforeach
</table>
@endif
@endsection