<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;
use sccventas\Prestamo;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamo = Prestamo::get();
        return view('prestamo')->with('prestamos',$prestamo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestamo= new Prestamo;
        $prestamo->NOM_PRE= $request->input('nom_pre');
        $prestamo->FFN_PRE= $request->input('ffn_pre');
        $prestamo->MAT_PRE= $request->input('mat_pre');
        $prestamo->OBS_PRE= $request->input('obs_pre');
        $prestamo->ID_USU= Auth::user()->id;
        $prestamo->FIN_PRE= Carbon::now();
        $prestamo->EST_PRE=0;
        $prestamo->save();    
        $mensaje= 'Prestamo realizado correctamente';
        return redirect()->route('prestamo.index')->with('mensaje',$mensaje);                            
    }

    public function devolucion(Request $request)
    {
        $id=$request->input('id');
        $prestamo=Prestamo::find($id);
        $prestamo->EST_PRE=1;
        $prestamo->save();
        $mensaje= 'Devolucion realizada correctamente';
        return redirect()->route('prestamo.index')->with('mensaje',$mensaje);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
