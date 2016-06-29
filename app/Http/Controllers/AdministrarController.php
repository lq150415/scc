<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;
use sccventas\Categoria;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;

class AdministrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexcat()
    {
        $categoria= Categoria::get();
        return view('administrar.categoria')->with('categorias',$categoria);
    }

    public function modifcat(Request $request)
    {
        $id=$request->input('idcat');
        $categoria= Categoria::find($id);
        $categoria->NOM_CAT = $request->input('nomcat');
        $categoria->DES_CAT = $request->input('descat');
        $categoria->save();
        $mensaje='Categoria modificada correctamente';  
        return redirect()->route('admincat')->with('mensaje',$mensaje);      
    }

    public function elicat(Request $request)
    {
        $id=$request->input('ideli');
        $categoria= Categoria::where('id','=',$id)->delete();
        $mensaje="Categoria eliminada";
              return redirect()->route('admincat')->with('mensaje2',$mensaje);
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
