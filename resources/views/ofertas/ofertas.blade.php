@extends('layouts.base')
@section('page-title', 'Ofertas')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1>Ofertas</h1>
                <p>Aquí se mostrarán, si existen, las ofertas ente cliente y articulos existentes.</p>
                <p>También se podrá importar un archivo csv.</p>
            </div>
            {!! Form::open(['url'=>'importar-oferta', 'method' =>'POST','files'=>true,'class'=>'form-inline']) !!}
            <div class="form-group">
                {!! Form::label('csv','Archivo CSV') !!}
                {!! Form::file('csv',['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class='col-md-12'>
            @include('layouts.messages')
            @if($ofertas->isEmpty())
                <div class="alert alert-danger" role="alert">
                    <p>No existen datos en la tabla Ofertas.</p>
                </div>
            @else
                <table id="ofertas-table" role="grid" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Articulo</th>
                        <th>Cliente</th>
                        <th>Cantidad</th>
                        <th>Importe total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ofertas as $oferta)
                        <tr>
                            <td>{{ $oferta->id }}</td>
                            <td>{!! link_to('articulo/'.$oferta->articulo->id, $oferta->articulo->nombre, ['class'=>''], null) !!}</td>
                            <td>{!! link_to('cliente/'.$oferta->cliente->id, $oferta->cliente->nombre, ['class'=>''], null) !!}</td>
                            <td>{{ $oferta->cantidad }}</td>
                            <td>{{ $oferta->importe_total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $ofertas->render() !!}
            @endif
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(function () {
            $("#ofertas-table").DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "order": [],
                "info": false,
                "autoWidth": false,
                "columnDefs": [ {
                    "targets"  : 'no-sort',
                    "orderable": false,
                }]
            });
        });
    </script>
@endsection