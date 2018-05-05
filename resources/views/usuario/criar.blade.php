@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Úsuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" nome="nome" value="{{ old('nome') }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" nome="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dn" class="col-md-2 col-form-label text-md-right">{{ __('Data de Nascimento') }}</label>

                            <div class="col-md-6">
                                <input id="dn" type="date" class="form-control{{ $errors->has('dn') ? ' is-invalid' : '' }}" nome="dn" required>

                                @if ($errors->has('dn'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-2 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-6">
                                <input id="cargo" type="text" class="form-control" nome="cargo" required>

                                @if ($errors->has('cargo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salario" class="col-md-2 col-form-label text-md-right">{{ __('Salario') }}</label>

                            <div class="col-md-6">
                                <input id="salario" type="text" class="form-control" nome="salario" required>

                                @if ($errors->has('salario'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('salario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nome_perfil" class="col-md-2 col-form-label text-md-right">{{ __('Nome do Perfil') }}</label>

                            <div class="col-md-6">
                                <input id="nome_perfil" type="text" class="form-control{{ $errors->has('nome_perfil') ? ' is-invalid' : '' }}" nome="nome_perfil" value="{{ old('nome_perfil') }}" required autofocus>

                                @if ($errors->has('nome_perfil'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome_perfil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="descricao">Descrição</label>
                                <textarea class="descricao" id="descricao" name="descricao" rows="5" cols="80" value="{{isset($perfil->descricao) ? $perfil->descricao : ''}}">
                                    {{isset($perfil->descricao) ? $perfil->descricao : ''}}
                            </textarea> 
                        </div>
                        <div class="col-md-10 form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                            <label for="foto">Foto</label>
                            
                            <input type="file" class="form-control" multiple name="foto" class="form-control">

                                @if($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
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
