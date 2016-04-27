<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'ofertas';
    protected $fillable = ['id','id_articulo','id_cliente','importe_total','cantidad'];

    public function articulo()
    {
        return $this->belongsTo('App\Articulo','id_articulo');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Cliente','id_cliente');
    }
}
