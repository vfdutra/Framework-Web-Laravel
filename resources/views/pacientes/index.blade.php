@extends('layouts.layoutpadrao')
@section('titulo')
Pacientes Cadastrados
@endsection

@section('conteudo')
@if ($message=Session::get('sucess'))
<div class="alert alert-success" role="alert">
    <p>{{$message}}</p>
</div>
@endif

<a href="{{url('pacientes/create')}}" class="btn btn-primary">Adicionar novo paciente</a><br><br>
<table class="table table-striped">
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>CPF</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>Endereco</td>
        <td>Idade</td>
        <td></td>
        <td></td>
    </tr>
    @foreach($pacientes as $paciente)
    <tr>
        <td>{{$paciente->id}}</td>
        <td>{{$paciente->nome}}</td>
        <td>{{$paciente->cpf}}</td>
        <td>{{$paciente->email}}</td>
        <td>{{$paciente->telefone}}</td>
        <td>{{$paciente->endereco}}</td>
        <td>{{$paciente->idade}}</td>
        <td>
            <a href="{{url('pacientes/'.$paciente->id.'/edit')}}" class="btn btn-primary">
                Editar
            </a>
        </td>
        <td>
            <form action="{{route('pacientes.destroy',$paciente->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection