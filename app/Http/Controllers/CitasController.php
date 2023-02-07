<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['citas'] = Citas::paginate(4);
        return view('citas.index', $datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('citas.create');
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
            'FechaCita'=>'required|string|max:100',
            'HoraCita'=>'required|string|max:100',
            'Mascota'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'La :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        //$datosCitas = request()->all();
        $datosCitas = request()->except('_token');
        Citas::insert($datosCitas);
        //return response()->json($datosCitas);
        return redirect('citas')->with('mensaje','Cita agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $citas = Citas::findOrFail($id);
        return view('citas.edit', compact('citas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'FechaCita'=>'required|string|max:100',
            'HoraCita'=>'required|string|max:100',
            'Mascota'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'La :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosCitas = request()->except(['_token','_method']);
        Citas::where('id','=',$id)->update($datosCitas);
        
        $citas = Citas::findOrFail($id);
        //return view('clientes.edit', compact('clientes'));

        return redirect('citas')->with('mensaje', 'Cita Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Citas::destroy($id);
        return redirect('citas')->with('mensaje', 'Cita Borrada');
    }
}
