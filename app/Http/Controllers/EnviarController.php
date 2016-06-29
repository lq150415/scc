<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;
use sccventas\Cliente;
use sccventas\Categoria;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;
use Mail;

class EnviarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=new Cliente;
        $clientes = $clientes->where('EMA_CLI','!=','')->get();
        $categorias= new Categoria;
        $categorias= $categorias->get();
        return view('email')->with('clientes',$clientes)->with('categorias',$categorias);
    }

     function enviar (Request $request){
          $mensaje= $request->input('mensaje');
          $this->subject= $request->input('subject');
          $this->email= $request->input('email');
          $this->nombre= $request->input('nombre');
    
        Mail::raw($mensaje,function($message) {
            $message->to($this->email ,$this->nombre)
            ->subject($this->subject);
        });
        $mensaje='E-mail enviado exitosamente';
        return redirect()->route('email.index')->with('mensaje',$mensaje);
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
