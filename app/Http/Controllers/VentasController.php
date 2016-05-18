<?php

namespace sccventas\Http\Controllers;

use PDF;   
use Illuminate\Http\Request;
use sccventas\Cliente;
use sccventas\Categoria;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=new Cliente;
        $clientes = $clientes->get();
        $categorias= new Categoria;
        $categorias= $categorias->get();
        return view('ventas')->with('clientes',$clientes)->with('categorias',$categorias);
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

    public function cliente(Request $request)
    {
        $cliente= new Cliente;
        $cliente->NOM_CLI = $request->input('nom_usu');
        $cliente->APA_CLI = $request->input('apa_usu');
        $cliente->AMA_CLI = $request->input('ama_usu');
        $cliente->DIR_CLI = $request->input('dir_usu');
        $cliente->TEL_CLI = $request->input('tel_usu');
        $cliente->EMA_CLI = $request->input('ema_usu');
        $cliente->save();
        $mensaje="Cliente registrado correctamente";
        return redirect()->route('ventas.index')->with('mensaje',$mensaje);
    }

    public function datos_pro()
    {
        $id = $_POST['id'];
        $productos = Producto::where('ID_RUB','=',$id)->get();
        $i=1;
        foreach ($productos as $producto):   
            $a=$producto->DES_PRO;
            $b="'$a'";
            $c=$producto->PUN_PRO;
            $d="'$c'"; 
            $e=$producto->id;
            $f="'$e'";    
            $h="'hidden'"; 
            $ir=$producto->ITM_PRO;
            $ij="'$ir'";
        $ab ="'visible'";
        if($i==1){  
        $html2 ='<a class="btn btn-primary" href="javascript:despliegaModal3('.$ab.');">+ Nuevo producto</a>
                        </br>
</br>
        <table id="example2" class="display table table-hover" width="100%" >
    <thead>
        <tr class="info">
            <th>Id</th>
            <th>Item </th>
            <th>Descripcion del producto</th>
            <th>Precio</th>
            <th>Agregar</th>    
            <th>Nuevo precio</th>   
        </tr>
    </thead><tbody id="tablabody">'.'<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->ITM_PRO.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th><a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"><span class="glyphicon glyphicon-usd"></span></a></th>'.'</tr>';
        echo "<script type='text/javascript'>";
        echo "function despliegaModal3(_valor){";
        echo "document.getElementById('bgVentanaModal3').style.visibility=_valor;";
        echo "}";
        echo "</script>";
        echo "<script type='text/javascript' language='javascript' class='init'>";
        echo "$(document).ready(function() {"; 
        echo "$('#example2').DataTable();";
        echo "} );";
        echo "</script>";  
        echo "<script type='text/javascript' lang='javascript'>";
        echo "var name = 'pre_pro[]';";
        echo "var name2 = 'can_pro[]';";
        echo "var name3 = 'sub_pro[]';";
        echo "function agregavalor(_value, data, data2,data3){";
        echo "document.getElementById('bgVentanaModal2').style.visibility = _value;";
        echo "$('#can_pro').val($('#cant').val());";
        echo "$('#idproducto').val(data3);";
        echo "$('#producto').val(data);";
        echo "$('#pre_pro').val(data2);";
        
    echo "var yea=document.getElementById('tabla').rows.length;";
    echo "yea--;";
    echo "var total=0;"; 
    echo "var campo=document.getElementsByName(name3);";
     echo "var precio=document.getElementsByName(name);";
    echo "var cantidad=document.getElementsByName(name2);";
    echo "$('#can_pro').change(function(){";
    echo "for (i = 0; i < yea; i++) { ";
    echo "campo[i].value = parseFloat(cantidad[i].value) * parseFloat(precio[i].value);";
    echo "}";
    echo"});";
    echo "$('#can_pro').change(function(){";
        echo "var total=0;"; 
    echo "for (i = 0; i < yea; i++) { ";
    echo "  total = total + parseFloat(campo[i].value);";
    echo "}";
    
    $abc='"<div class=';
    $abc2="'form-group'><label class='col-lg-4 control-label'>TOTAL</label><div class='col-lg-4'><input class='form-control col-lg-2' margin-top:0; float:right;' type='text' readonly='readonly' id='total' value='";
    $abc3='"+total+"';
    $abc4="' ></div><label class='col-sm-1 control-label'>---BS</label></div>";
    $abc5='";';
    echo "  document.getElementById('demo').innerHTML = ".$abc.$abc2.$abc3.$abc4.$abc5;
    echo"});";
    echo "}";
        echo "</script>";
        echo "<script type='text/javascript'>";
        echo "function agregavalor2(_valor, data1, data2, data3, data4){";
        echo "document.getElementById('bgVentanaModal4').style.visibility=_valor;";
        echo "$('#itm_prod2').val(data1);";
        echo "$('#des_prod2').val(data2);";
        echo "$('#pun_prod2').val(data3);";
        echo "$('#idprod2').val(data4);";   
        echo "}</script>";
        
        echo $html2; $i++; }
        else{
        
            $html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'</th>'.'<th>'.$producto->ITM_PRO.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.'<a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"> <span class="glyphicon glyphicon-usd"></span></a>'.'</th>'.'</tr>';
            echo $html2;
        }
        endforeach;
        
    }

    public function graficos(){
        return view('grafico');
    }
public function graficos2()
{
 
    return view('grafico2');

}
public function graficos3()
{
 
    return view('grafico3');

}
public function pdf(){


        PDF::SetTitle('Formulario DGAA');

        PDF::AddPage();

        PDF::Write(0, 'DATOS GENERALES DE VENTAS');

        PDF::Output('hello_world.pdf');
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
