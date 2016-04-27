<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Cliente;
use App\Oferta;
use App\Http\Requests\CsvRequest;
use App\Http\Requests;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::orderBy('created_at','DESC')->paginate(50);
        return view('ofertas.ofertas',compact('ofertas'));
    }
    public function store(CsvRequest $request)
    {
        $model = new Oferta();
        $csv = array_map('str_getcsv', file($request->file('csv')));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);
        $invalid=0;
        $valid=0;
        if(count(array_diff_key(array_flip($model->getFillable()),$csv[0])) == 0)
        {
            foreach($csv as $data)
            {
                if(Cliente::find($data['id_cliente']) && Articulo::find($data['id_articulo'])){
                    if(!Oferta::find($data['id']))
                    {
                        $data['activo'] = isset($data['activo']) ? (bool)$data['activo']: false;
                        Oferta::create($data)->save();
                        $valid ++;
                    }else
                    {
                        $invalid++;
                    }
                }else
                {
                    $invalid++;
                }
            }
            $valid = 'Insertado '.$valid.' elementos';
            $invalid ='No insertados '.$invalid.' elementos';
        }else{
            $invalid = 'El archivo importado no pertenece a esta categoria';
        }
        return redirect()->back()->with(compact('valid','invalid'));
    }
}
