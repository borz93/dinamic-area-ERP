@extends('layouts.base')
@section('page-title', 'Artículo - '. $articulo->nombre)
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1>Artículo: {{$articulo->nombre}}</h1>
            </div>
        </div>
        <div class='col-md-5'>
            <label>Imagen del artículo</label>
            <div class="thumbnail">
                <img src="http://{!! $articulo->imagen_grande !!}" class="img-responsive">
            </div>

        </div>
        <div class='col-md-7'>
            <label>Artículo</label>
            <p><span class="fa fa-barcode"></span> {{$articulo->nombre}}</p>
            <label>Activo</label>
            @if($articulo->activo)
                <p><span class="fa fa-toggle-on"></span></p>
            @else
                <p><span class="fa fa-toggle-off"></span></p>
            @endif
            <label>Categoría</label>
            <p><span class="fa fa-cubes"></span> {{$articulo->categoria}}</p>
            <label>Precio</label>
            <p><span class="fa fa-money"></span> {{$articulo->precio}}</p>
            <label>Descripción</label>
            <p><span class="fa fa-file-word-o"></span> {{$articulo->descripcion}}</p>
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
@endsection