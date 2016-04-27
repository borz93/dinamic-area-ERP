<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\CsvRequest;
use App\Http\Requests;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('created_at','DESC')->paginate(50);
        return view('clientes.clientes',compact('clientes'));
    }
    public function store(CsvRequest $request)
    {
        $model=new Cliente();
        extract(Cliente::importCsv($request->file('csv'),$model->getFillable()));
        return redirect()->back()->with(compact('valid','invalid'));
    }
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.cliente',compact('cliente'));
    }
}
