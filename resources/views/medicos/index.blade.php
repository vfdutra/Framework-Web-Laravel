@extends('layouts.layoutpadrao')
@section('titulo')
Médicos Cadastrados
@endsection

@section('conteudo')
@if ($message=Session::get('sucess'))
<div class="alert alert-success" role="alert">
    <p>{{$message}}</p>
</div>
@endif

<a href="{{url('medicos/create')}}" class="btn btn-primary">Adicionar novo médico</a><br><br>
<table class="table table-striped">
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>CPF</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>CRM</td>
        <td>Especialidade</td>
        <td></td>
        <td></td>
    </tr>
    @foreach($medicos as $medico)
    <tr>
        <td>{{$medico->id}}</td>
        <td>{{$medico->nome}}</td>
        <td>{{$medico->cpf}}</td>
        <td>{{$medico->email}}</td>
        <td>{{$medico->telefone}}</td>
        <td>{{$medico->crm}}</td>
        <td>{{$medico->especialidade}}</td>
        <td>
            <a href="{{url('medicos/'.$medico->id.'/edit')}}" class="btn btn-primary">
                Editar
            </a>
        </td>
        <td>
            <form action="{{route('medicos.destroy',$medico->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection