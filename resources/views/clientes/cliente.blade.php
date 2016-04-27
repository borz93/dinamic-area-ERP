@extends('layouts.base')
@section('page-title', 'Cliente - '. $cliente->nombre)
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1>Cliente: {{$cliente->nombre}}</h1>
            </div>
        </div>
        <div class='col-md-6'>
            <p><span class="fa fa-user"></span> {{$cliente->nombre}}</p>
            <p><span class="fa fa-user-secret"></span> {{$cliente->dni}}</p>
        </div>
        <div class='col-md-6'>
            <p><span class="fa fa-phone"></span> {{$cliente->telefono}}</p>
            <p><span class="fa fa-envelope"></span> {{$cliente->email}}</p>
        </div>
        <div class='col-md-12'>
            <h3>Ofertas del cliente</h3>
            @include('clientes.layouts.ofertastable')
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
@endsection