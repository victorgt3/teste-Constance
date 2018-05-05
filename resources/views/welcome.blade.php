@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista de Usuarios
                    <a class="btn btn-info" style="float: right" href="{{url('usuarios/create')}}" >Cadastrar Usuario</a>
                </div>
                
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                            @foreach($usuario as $usuarios)
                            <tbody>
                                <tr>
                                    <th>{{$usuarios->id}}</th>
                                    <td>{{$usuarios->nome}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('usuarios.edit',$usuarios->id)}}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{route('usuarios.destroy',$usuarios->id)}}' : FALSE)">Deletar</a>
                                        <a class="btn btn-success" href="#">Detalhes</a>
                                    </td>
                                </tr>                            
                            </tbody>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
