@extends('adminlte::page')

@section('title', 'Dados do Perfil')

@section('content')
    @include('layouts.alert')

    <div class="row">
        <div class="col-12">
            <div>
                <div class="card">
                    <h3 class="card-header text-center">Dados de Perfil</h3>
                    <div class="card-body">
                        <p class="alert alert-light"><b>Nome: </b>{{ $user->name }}</p>
                        <p class="alert alert-light"><b>Email: </b>{{ $user->email }}</p>

                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userEditModal">
                            Atualizar Dados
                        </button>

                        <!-- Modal -->
                        @include('layouts.modal-edit-user')
                    </div>
                    <div class="card-footer text-muted">
                        <b>Data de Cadastro: </b><span>{{ date_format($user->created_at,  'd/m/Y - H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@stop
