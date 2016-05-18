<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;
use sccventas\Cliente;
use Validator;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientes');
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
         $messages = array(
            
            'nom_usu.required'=>'El nombre es requerido',
            'apa_usu.required'=>'El apellido paterno es requerido',
            'ama_usu.required'=>'El apellido materno es requerido',
            'tel_usu.required'=>'El nick es requerido',
            'ema_usu.required'=>'El e-mail es requerido',
            'nom_usu.alpha'=>'El nombre solo debe tener letras',
            'apa_usu.alpha'=>'El apellido paterno solo debe tener letras',
            'ama_usu.alpha'=>'El apellido materno solo debe tener letras',
           
         );
         $validator = Validator::make($request->all(), [
            'nom_usu' => 'required|alpha',
            'apa_usu' => 'required|alpha',
            'ama_usu' => 'required|alpha',
            'tel_usu' => 'required|integer',
            'ema_usu' => 'required|email', 
        ],$messages);
        


        $cliente= new Cliente;
        $cliente->NOM_CLI = $request->input('nom_usu');
        $cliente->APA_CLI = $request->input('apa_usu');
        $cliente->AMA_CLI = $request->input('ama_usu');
        $cliente->DIR_CLI = $request->input('dir_usu');
        $cliente->TEL_CLI = $request->input('tel_usu');
        $cliente->EMA_CLI = $request->input('ema_usu');
         if ($validator->fails()) {
            return redirect()->route('clientes.index')
                        ->withInput()
                        ->withErrors($validator)
                       ;
        }else{
        $cliente->save();
        $mensaje="Cliente registrado correctamente";
        return redirect()->route('clientes.index')->with('mensaje',$mensaje);    }                    
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
