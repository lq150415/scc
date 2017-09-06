<?php

namespace sccventas\Http\Controllers;

use Illuminate\Http\Request;
use sccventas\Categoria;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;
use sccventas\User;
use sccventas\Cliente;
use sccventas\Venta;
use sccventas\Vendido;
use sccventas\Material;
use sccventas\Paquete;
use sccventas\Empaquetado;
use sccventas\Articulos;
use Illuminate\Support\Facades\Auth; //component of autentication data

class AdministrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        if(Auth::user()->NIV_USU == 0):

        else:
          abort(503);
        endif;
    }
    public function indexcat()
    {
        $categoria= Categoria::get();
        return view('administrar.categoria')->with('categorias',$categoria);
    }
    public function indexusu()
    {
        $usuario= User::get();
        return view('administrar.usuario')->with('usuarios',$usuario);
    }
    public function indexcli()
    {
        $cliente= Cliente::get();
        return view('administrar.cliente')->with('clientes',$cliente);
    }
    public function indexven()
    {
        $venta= Venta::join('clientes','clientes.id','=','ID_CLI')->select('ventas.id','FEC_VEN','FAC_VEN','NOM_CLI','APA_CLI','AMA_CLI')->get();
        $vendido= Vendido::get();
        return view('administrar.venta')->with('ventas',$venta)->with('vendidos',$vendido);
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

    public function modifcli(Request $request)
    {
        $id=$request->input('idcli');
        $cliente= Cliente::find($id);
        $cliente->NOM_CLI = $request->input('nom_usu');
        $cliente->APA_CLI = $request->input('apa_usu');
        $cliente->AMA_CLI = $request->input('ama_usu');
        $cliente->TEL_CLI = $request->input('tel_usu');
        $cliente->EMA_CLI = $request->input('ema_usu');
        $cliente->DIR_CLI = $request->input('dir_usu');
        $cliente->save();
        $mensaje='Cliente modificado correctamente';
        return redirect()->route('admincli')->with('mensaje',$mensaje);
    }

    public function modifusu(Request $request)
    {
        $id=$request->input('idusu');
        $usuarios= User::find($id);
        $usuarios->NIC_USU = $request->input('nomusu');
        $usuarios->NIV_USU = $request->input('nivusu');
        $usuarios->save();
        $mensaje='Datos de usuario modificados correctamente';
        return redirect()->route('adminusu')->with('mensaje',$mensaje);
    }

    public function mcousu(Request $request)
    {
        $id=$request->input('idcon');
        $usuarios= User::find($id);
        $usuarios->password =bcrypt($request->input('conusu'));
        $usuarios->save();
        $mensaje='Contraseña modificada correctamente';
        return redirect()->route('adminusu')->with('mensaje',$mensaje);
    }

    public function elicat(Request $request)
    {
        $id=$request->input('ideli');
        $categoria= Categoria::where('id','=',$id)->delete();
        $mensaje="Categoria eliminada";
              return redirect()->route('admincat')->with('mensaje2',$mensaje);
    }
    public function elicli(Request $request)
    {
        $id=$request->input('ideli');
        $cliente= Cliente::where('id','=',$id)->delete();
        $mensaje="Cliente eliminado";
              return redirect()->route('admincli')->with('mensaje2',$mensaje);
    }

    public function eliusu(Request $request)
    {
        $id=$request->input('ideli');
        $usuarios= User::where('id','=',$id)->delete();
        $mensaje="Usuario eliminado";
              return redirect()->route('adminusu')->with('mensaje2',$mensaje);
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
     * Clam  \Illuminate\Http\Request  $request
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
