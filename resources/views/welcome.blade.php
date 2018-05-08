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
                                <th>Telefone</th>
                                <th>Nome Perfil</th>
                                <th>foto</th>
                                <th>Ação</th>
                            </tr>
                            @foreach($usuario as $usuarios)
                            <tbody>
                                <tr>
                                    <th>{{$usuarios->id}}</th>
                                    <td>{{$usuarios->nome}}</td>
                                    <td>{{$usuarios->telefone}}</td>
                                    <td>{{$usuarios->nome_perfil}}</td>
                                     <td><img src="{{asset($usuarios->foto)}}" width="50"></td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('usuarios.edit',$usuarios->id)}}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{route('usuarios.destroy',$usuarios->id)}}' : FALSE)">Deletar</a>
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
