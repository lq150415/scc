<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;

use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;
use Storage;
use Mail;
use sccventas\Cliente;
class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function enviar(Request $request)
   {

   $pathToFile="";
   $containfile=false;
   if($request->hasFile('file') ){
      $containfile=true;
      $file = $request->file('file');
      $nombre=$file->getClientOriginalName();
      $pathToFile= public_path() ."/storage/". $nombre;
   }


   $destinatario=$request->input("destinatario");
   $asunto=$request->input("asunto");
   $contenido=$request->input("contenido_mail");


   $data = array('contenido' => $contenido);
$r= Mail::send('plantilla_correo', $data, function ($message) use ($asunto,$destinatario,  $containfile,$pathToFile) {
       $message->from('scc@sccbolivia.com', 'Sistema cristiano de comunicaciones');
       $message->to($destinatario)->subject($asunto);
      if($containfile){
       $message->attach($pathToFile);
       }

   });
   if($r){
              return view("mensajes.msj_correcto")->with("msj","Correo Enviado correctamente");
     }
     else
     {
          return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");
     }


   }


   public function enviar2(Request $request)
  {

  $pathToFile="";
  $containfile=false;
  if($request->hasFile('file') ){
     $containfile=true;
     $file = $request->file('file');
     $nombre=$file->getClientOriginalName();
     $pathToFile= public_path() ."/storage/". $nombre;
  }

  $asunto=$request->input("asunto");
  $contenido=$request->input("contenido_mail");

  $clientes= Cliente::where('NOM_CLI','=','Luis')->get();
  //$clientes= Cliente::where('EMA_CLI','!=','')->get();

  foreach ($clientes as $cliente) {
    $destinatario[]=$cliente->EMA_CLI;
  }
  $data = array('contenido' => $contenido);
$r= Mail::send('plantilla_correo', $data, function ($message) use ($asunto,$destinatario,  $containfile,$pathToFile) {
      $message->from('scc@sccbolivia.com', 'Sistema cristiano de comunicaciones');
      $message->to($destinatario)->subject($asunto);
     if($containfile){
      $message->attach($pathToFile);
      }

  });
  if($r){
             return view("mensajes.msj_correcto")->with("msj","Correo Enviado correctamente");
    }
    else
    {
         return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");
    }


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
      if($request->hasFile('file') ){

    $file = $request->file('file');
    $extension = $file->getClientOriginalExtension();
    $nombre=$file->getClientOriginalName();
    $r= Storage::disk('local')->put($nombre,  \File::get($file));


     }
     else{

        return "no";
     }

    if($r){
        return $nombre ;
    }
    else
    {
        return "error vuelva a intentarlo";
    }

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
