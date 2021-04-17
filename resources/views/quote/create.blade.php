@extends('adminlte::page')

@section('title', 'Cotar Moeda')

@section('content')

    @include('layouts.error')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3 class="card-header text-center">Cotação de Moeda</h3>

                <form action="{{ route('quotes.store') }}" method="POST" id="form-quote">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-xs-12 col-md-2">
                                <div class="form-group">
                                    <label for="price">Valor</label>
                                    <input type="number"
                                           name="price"
                                           min="1"
                                           required
                                           class="form-control"
                                           id="price"
                                           value="{{ old('price') }}"
                                    >
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="currency_from">Converter de: </label>
                                    <select name="currency_from" id="currency_from" class="form-control" required>
                                        <option disabled selected>-- Selecione --</option>
{{--                                        <option value="Bitcoin (BTC)">Bitcoin (BTC)</option>--}}
{{--                                        <option value="Dólar Americano (USD)">Dólar Americano (USD)</option>--}}
{{--                                        <option value="Euro (EUR)">Euro (EUR)</option>--}}
{{--                                        <option value="Peso Argentino (ARS)">Peso Argentino (ARS)</option>--}}
{{--                                        <option value="Real Brasileiro (BRL)">Real Brasileiro (BRL)</option>--}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="currency_to">Para: </label>
                                    <select name="currency_to" id="currency_to" class="form-control" required>
                                        <option disabled selected>-- Selecione --</option>
                                        <option value="Dólar Americano (USD)">Dólar Americano (USD)</option>
                                        <option value="Euro (EUR)">Euro (EUR)</option>
                                        <option value="Real Brasileiro (BRL)">Real Brasileiro (BRL)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-2">
                                <div class="form-group mt-4">
                                    <button class="btn btn-info"
                                            type="button"
                                            id="btn-covert"
                                            style="margin-top: 7px;">
                                        <i title="Converter" class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" style="display:none" id="card-currency-result">

                        <div class="col-md-12 mt-2">
                            <h3>Resultado da Conversão</h3>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text"
                                               name="price_result"
                                               required
                                               class="form-control text-center"
                                               id="price_result"
                                               readonly
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start">
                                <div class="card col-md-6">
                                    <div class="card-body">
                                        <strong>Conversão de: </strong><span id="tag-currency_from"></span>
                                        <br>
                                        <strong>Valor a converter: </strong><span id="tag-price"></span>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-body">
                                        <strong>Para: </strong><span id="tag-currency_to"></span>
                                        <br>
                                        <strong>Resultado da conversão: </strong><span id="tag-price_result"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Registrar Cotação</button>
                                <button type="button" id="btn-clear-fields" class="btn btn-danger">Limpar Campos</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@stop
