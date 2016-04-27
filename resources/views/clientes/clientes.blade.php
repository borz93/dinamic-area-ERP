@extends('layouts.base')
@section('page-title', 'Clientes')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1>Clientes</h1>
                <p>Aquí se mostrarán, si existen, los clientes registrados en la base de datos.</p>
                <p>También se podrá importar un archivo csv.</p>
            </div>
            {!! Form::open(['url'=>'importar-cliente', 'method' =>'POST','files'=>true,'class'=>'form-inline']) !!}
            <div class="form-group">
                {!! Form::label('csv','Archivo CSV') !!}
                {!! Form::file('csv',['class'=>'form-control']) !!}

            </div>
            {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class='col-md-12'>
            @include('layouts.messages')
            @if($clientes->isEmpty())
                <div class="alert alert-danger" role="alert">
                    <p>No existen datos en la tabla Clientes.</p>
                </div>
            @else
                <table id="clientes-table" role="grid" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>E-mail</th>
                        <th>Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->dni }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{!! link_to('cliente/'.$cliente->id, 'Ir', ['class'=>'btn btn-info'], null) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $clientes->render() !!}
            @endif
        </div>

        <!-- /.row -->
    </div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $("#clientes-table").DataTable({
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