<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes'] = Clientes::paginate(4);
        return view('clientes.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'DocumentoIdentidad'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'NumeroCelular'=>'required|string|max:100',
            'Email'=>'required|Email',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        //$datosClientes = request()->all();
        $datosClientes = request()->except('_token');
        Clientes::insert($datosClientes);
        //return response()->json($datosClientes);
        return redirect('clientes')->with('mensaje','Cliente agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clientes = Clientes::findOrFail($id);
        return view('clientes.edit', compact('clientes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'DocumentoIdentidad'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'NumeroCelular'=>'required|string|max:100',
            'Email'=>'required|Email',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        //
        $datosClientes = request()->except(['_token','_method']);
        Clientes::where('id','=',$id)->update($datosClientes);
        
        $clientes = Clientes::findOrFail($id);
        //return view('clientes.edit', compact('clientes'));

        return redirect('clientes')->with('mensaje', 'Cliente Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Clientes::destroy($id);
        return redirect('clientes')->with('mensaje', 'Cliente Borrado');
    }
}
