<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ImportCsvTrait as ImportCsvTrait;

class Articulo extends Model

{
    use ImportCsvTrait;
    protected $table = 'articulos';
    protected $fillable = ['id','nombre','descripcion','imagen','imagen_grande','activo','categoria','precio'];

    public function ofertas()
    {
        return $this->hasMany('App\Oferta','id_articulo');
    }
}
