<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ImportCsvTrait as ImportCsvTrait;

class Cliente extends Model
{
    use ImportCsvTrait;
    protected $table = 'clientes';
    protected $fillable = ['id','nombre','dni','telefono','email'];


    public function ofertas()
    {
        return $this->hasMany('App\Oferta','id_cliente');
    }
}
