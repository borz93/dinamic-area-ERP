@if(count($cliente->ofertas)>0)
<table id="ofertas-table" role="grid" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Articulo</th>
        <th>Cantidad</th>
        <th>Importe total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cliente->ofertas as $oferta)
        <tr>
            <td>{{ $oferta->articulo->nombre }}</td>
            <td>{{ $oferta->cantidad }}</td>
            <td>{{ $oferta->importe_total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <div class="alert alert-danger" role="alert">
        <p>No existen ofertas.</p>
    </div>
@endif