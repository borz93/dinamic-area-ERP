@extends('layouts.base')
@section('page-title', 'Artículos')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1>Artículos</h1>
                <p>Aquí se mostrarán, si existen, los articulos que se encuentren en la base de datos.</p>
                <p>También se podrá importar un archivo csv.</p>
            </div>
            {!! Form::open(['url'=>'importar-articulo', 'method' =>'POST','files'=>true,'class'=>'form-inline']) !!}
                <div class="form-group">
                    {!! Form::label('csv','Archivo CSV') !!}
                    {!! Form::file('csv',['class'=>'form-control']) !!}
                </div>
                {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <br>
        <div class='col-md-12'>
            @include('layouts.messages')
            @if($articulos->isEmpty())
                <div class="alert alert-danger" role="alert">
                    <p>No existen datos en la tabla Artículos.</p>
                </div>
            @else
                <table id="articulos-table" role="grid" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Activo</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articulos as $articulo)
                        <tr>
                            <td><img src="http://{!! $articulo->imagen !!}" class="img-circle"></td>
                            <td>{{ $articulo->id }}</td>
                            <td>{{ $articulo->nombre }}</td>
                            <td>{{ $articulo->descripcion }}</td>
                            <td>{{ $articulo->activo }}</td>
                            <td>{{ $articulo->categoria }}</td>
                            <td>{{ $articulo->precio }}</td>
                            <td>{!! link_to('articulo/'.$articulo->id, 'Ir', ['class'=>'btn btn-info'], null) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $articulos->render() !!}
            @endif
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $("#articulos-table").DataTable({
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