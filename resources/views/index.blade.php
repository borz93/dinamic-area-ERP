@extends('layouts.base')
@section('page-title', 'Index')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <h2>Dinamic area ERP</h2>
            <br>
            <h3>Prueba técnica PHP</h3>
            <p>Pequeña aplicación web creada para solucionar el problema dado en la prueba técnica.</p>
            <p>Consta de un menu superior para poder navegar entre las distintas secciones.</p>
            <p>En cada una de ella, se podrá visualizar los datos propios dependiendo de la sección y se podra importar archivos CSV.</p>
            <p>Tanto en Artículos y clientes, se podrá ver con mas detalle cada elemento reguistrado.</p>
            <br>
            <h3>Frameworks, tecnologia y principales librerias usadas</h3>
            <div class="list-group">
                {!! link_to('http://www.mysql.com/', 'PHP version 7.0.0', ['class'=>'list-group-item','target'=>'_blank'], null) !!}
                {!! link_to('http://php.net/manual/es/migration70.new-features.php', 'MySQL', ['class'=>'list-group-item','target'=>'_blank'], null) !!}
                {!! link_to('https://laravel.com/', 'Laravel 5.2 Framework', ['class'=>'list-group-item','target'=>'_blank'], null) !!}
                {!! link_to('http://getbootstrap.com/', 'Bootstrap', ['class'=>'list-group-item','target'=>'_blank'], null) !!}
                {!! link_to('https://fortawesome.github.io/Font-Awesome/', 'Font awesome icons', ['class'=>'list-group-item','target'=>'_blank'], null) !!}
            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection
@section('javascript')
@endsection