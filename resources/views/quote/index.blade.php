@extends('adminlte::page')

@section('title', 'Histórico de Cotações')

@section('content')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <h3 class="text-center">Histórico de Cotações</h3>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('quotes.create') }}" class="btn btn-info float-right" >
                                <i class="fas fa-plus-square"></i> Nova Cotação</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Valor</th>
                                <th>Convertido de</th>
                                <th>Convertido para</th>
                                <th>Resultado da Conversão</th>
                                <th>Data de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($quotes) > 0)
                            @foreach($quotes as $quote)
                                <tr>
                                    <td>{{ $quote->price }}</td>
                                    <td>{{ $quote->currency_from }}</td>
                                    <td>{{ $quote->currency_to }}</td>
                                    <td>{{ $quote->price_result }}</td>
                                    <td>{{ date_format($quote->created_at,  'd/m/Y - H:i') }}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Não há registros cadastrados!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-felx justify-content-center mt-2">
                        {{ $quotes->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
