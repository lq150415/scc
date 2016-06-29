<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;
use sccventas\Categoria;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use sccventas\Procedencia;
use sccventas\Genero;
use sccventas\Archivo;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $archivo=Archivo::get();
        $procedencias=Procedencia::get();
        $genero=Genero::get();
        return view('materialprog')->with('procedencias',$procedencias)->with('archivos',$archivo)->with('generos',$genero);
    }
    public function index2()
    {
        return view('materialsumma');
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

    public function registrarcategoria(Request $request)
    {
        $categoria = new Categoria;
        $categoria->NOM_CAT= $request->input('nom_cat');
        $categoria->DES_CAT= $request->input('des_cat');
        $categoria->ID_USU= Auth::user()->id;
        $categoria->save();
        $mensaje='Categoria registrada correctamente';
        return redirect()->route('admincat')->with('mensaje',$mensaje);

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
