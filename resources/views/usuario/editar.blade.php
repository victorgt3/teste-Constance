@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar Usuario</div>

                <div class="card-body">
                    <form method="post" action="{{route('usuarios.update',$usuario->id)}}" enctype="multipart/form-data">
                    @csrf
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put"> 
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" value="{{isset($usuario->nome) ? $usuario->nome : ''}}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{isset($usuario->email) ? $usuario->email : ''}}" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="telefone" value="{{isset($usuario->telefone) ? $usuario->telefone : ''}}" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="dn" value="{{isset($usuario->dn) ? $usuario->dn : ''}}" placeholder="Data de Nascimento">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cargo" value="{{isset($usuario->cargo) ? $usuario->cargo : ''}}" placeholder="Cargo">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="salario" value="{{isset($usuario->salario) ? $usuario->salario : ''}}" placeholder="Salario">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome_perfil" value="{{isset($perfil->nome_perfil) ? $perfil->nome_perfil : ''}}" placeholder="Nome do Perfil">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="descricao">Descrição</label>
                                <textarea class="descricao" id="descricao" name="descricao" value="{{isset($perfil->descricao) ? $perfil->descricao : ''}}" rows="5" cols="80" >
                                {{isset($perfil->descricao) ? $perfil->descricao : ''}}
                            </textarea> 
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="foto">Foto</label>
                            <img src="{{asset($usuario->foto)}}" width="50">
                            <input type="file" class="form-control" multiple name="foto" class="form-control">
                        </div> 

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection