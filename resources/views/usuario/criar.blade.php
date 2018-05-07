@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro de Usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" value="" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="telefone" value="" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="dn" value="" placeholder="Data de Nascimento">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cargo" value="" placeholder="Cargo">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="salario" value="" placeholder="Salario">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome_perfil" value="" placeholder="Nome do Perfil">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="descricao">Descrição</label>
                                <textarea class="descricao" id="descricao" name="descricao" rows="5" cols="80" >
                                    
                            </textarea> 
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" multiple name="foto" class="form-control">
                        </div> 

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
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