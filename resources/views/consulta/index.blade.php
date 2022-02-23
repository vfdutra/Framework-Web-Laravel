@extends('layouts.layoutpadrao')
@section('titulo')
Consultas Cadastradas
@endsection

@section('conteudo')
@if ($message=Session::get('sucess'))
<div class="alert alert-success" role="alert">
    <p>{{$message}}</p>
</div>
@endif

<a href="{{url('consulta/create')}}" class="btn btn-primary">Adicionar nova consulta</a><br><br>
<table class="table table-striped">
    <tr>
        <td>Id</td>
        <td>Data</td>
        <td>Hora</td>
        <td>Convenio</td>
        <td>Valor</td>
        <td>Paciente</td>
        <td>Médico</td>
        <td></td>
        <td></td>
    </tr>
    @foreach($consulta as $consulta)
    <tr>
        <td>{{$consulta->id}}</td>
        <td>{{$consulta->dt_consulta}}</td>
        <td>{{$consulta->hr_consulta}}</td>
        <td>{{$consulta->valor}}</td>
        <td>{{$consulta->convenio}}</td>
        <td>{{$consulta->pacientes->nome}}</td>
        <td>{{$consulta->medicos->nome}}</td>
        <td>
            <a href="{{url('consulta/'.$consulta->id.'/edit')}}" class="btn btn-primary">
                Editar
            </a>
        </td>
        <td>
            <form action="{{route('consulta.destroy',$consulta->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection