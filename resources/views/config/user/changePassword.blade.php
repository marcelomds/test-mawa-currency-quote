@extends('adminlte::page')

@section('title', 'Alterar Senha')

@section('content_header')
    <h2>Alterar Senha</h2>
@stop

@section('content')
    @include('sweetalert::alert')

    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.password.change', $user) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Senha Atual</label>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="new_password">Nova Senha</label>
                            <input type="password"
                                   name="new_password"
                                   id="new_password"
                                   class="form-control"
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="new_password_confirm">Confirmar Nova Senha</label>
                            <input type="password"
                                   name="new_password_confirm"
                                   id="new_password_confirm"
                                   class="form-control"
                                   required>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="form-group col-12">
                            <button class="btn btn-primary btn-md mb-0" type="submit">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
