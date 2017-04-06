<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;
use sccventas\User;
use Validator;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'nic_usu.unique' => '¡Ese nick ya esta en uso, por favor utiliza otro!',
            'nom_usu.required'=>'El nombre es requerido',
            'apa_usu.required'=>'El apellido paterno es requerido',
            'ama_usu.required'=>'El apellido materno es requerido',
            'nic_usu.required'=>'El nick es requerido',
            'niv_usu.required'=>'Seleccione el nivel de usuario correcto',
            'pas_usu.required'=>'El password es requerido',
            'alpha',
            'nom_usu.regex'=>'El nombre solo debe tener letras',
            'apa_usu.regex'=>'El apellido paterno solo debe tener letras',
            'ama_usu.regex'=>'El apellido materno solo debe tener letras',
           
         );
         
         $validator = Validator::make($request->all(), [
            'nom_usu' => 'required|regex:/^[a-z\s]+$/i',
            'apa_usu' => 'required|regex:/^[a-z\s]+$/i',
            'ama_usu' => 'required|regex:/^[a-z\s]+$/i',
            'nic_usu' => 'required|unique:users',
            'niv_usu' => 'required|integer',
            'pas_usu' => 'required', 
        ],$messages);
        

         $request->flash();
        $usuario= new User;
        $usuario->NOM_USU = $request->input('nom_usu');
        $usuario->APA_USU = $request->input('apa_usu');
        $usuario->AMA_USU = $request->input('ama_usu');
        $usuario->NIC_USU = $request->input('nic_usu');
        $usuario->NIV_USU = $request->input('niv_usu');
        $usuario->password = bcrypt($request->input('pas_usu'));
         if ($validator->fails()) {
            return redirect()->route('usuarios.index')
                        ->withInput()
                        ->withErrors($validator)
                       ;
        }else{
        $usuario->save();
        $mensaje="Usuario registrado correctamente";
        return redirect()->route('usuarios.index')->with('mensaje',$mensaje);                        }
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
