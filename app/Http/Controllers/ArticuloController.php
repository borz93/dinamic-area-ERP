<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CsvRequest;
use App\Articulo;

class ArticuloController extends Controller
{

    public function index()
    {
        $articulos = Articulo::orderBy('created_at','DESC')->paginate(50);
        return view('articulos.articulos',compact('articulos'));
    }
    public function store(CsvRequest $request)
    {
        $model = new Articulo();
        extract(Articulo::importCsv($request->file('csv'),$model->getFillable()));
        return redirect()->back()->with(compact('valid','invalid'));
    }
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('articulos.articulo',compact('articulo'));
    }
}
