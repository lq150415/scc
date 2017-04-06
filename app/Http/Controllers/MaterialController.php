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
use sccventas\Material;
use sccventas\Articulo;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Categoria::get();
        $archivo=Archivo::get();
        $procedencias=Procedencia::get();
        $genero=Genero::get();
        return view('materialprog')->with('procedencias',$procedencias)->with('archivos',$archivo)->with('categorias',$categorias)->with('generos',$genero);
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
        $material= new Material;
        $material->ID_USU= Auth::user()->id;
        $material->COD_MAT= $request->input('cod_mat');
        $material->TIT_MAT= $request->input('tit_mat');
        $material->SUB_MAT= $request->input('sub_mat');
        $material->ANP_MAT= $request->input('anp_mat');
        $material->DUR_MAT= $request->input('dur_mat');
        $material->DIR_MAT= $request->input('dir_mat');
        $material->PAI_MAT= $request->input('pai_mat');
        $material->GUI_MAT= $request->input('gui_mat');
        $material->ID_GEN= $request->input('gen_mat');
        $material->EST_MAT= $request->input('est_mat');
        $material->RES_MAT= $request->input('res_mat');
        $material->COM_MAT= $request->input('com_mat');
        if(is_null($request->file('files'))){
             $material->POR_MAT= 'X';
        }else{
        $material->POR_MAT= $material->TIT_MAT.'-'.$material->COD_MAT;

        \Storage::disk('local')->put($material->POR_MAT, \File::get($request->file('files')));
        }
        $material->ID_UBI= $request->input('id_ubi');
        $material->DES_UBI= $request->input('des_ubi');
        $material->ACT_MAT= 1;
        $material->NRO_PRO= $request->input('nro_pro');
        $material->ID_PRO= $request->input('id_pro');
        $material->ID_ARC= $request->input('id_arc');
        $material->save();
        $mensaje="Material registrado correctamente";

        if($request->input('nom_art')!='' && $request->input('pre_art'))
        {
            $articulo = new Articulo;
            $articulo->TIT_ART=$request->input('nom_art');
            $articulo->PRE_ART=$request->input('pre_art');
            $articulo->ID_CAT=$request->input('id_cat');
            $articulo->ID_MAT=$material->id;
            $articulo->save();
            $mensaje="Material y articulo registrados correctamente";
        }
        $mensaje="Material registrado correctamente";
        return redirect()->route('material')->with('mensaje',$mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function hoja()
     {
       $materiales = Material::where('id','!=','0')->get();
       return view('hoja')->with('materiales',$materiales);
     }
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
