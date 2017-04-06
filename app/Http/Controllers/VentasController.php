<?php

namespace sccventas\Http\Controllers;
use TCPDF;
use PDF;
use Illuminate\Http\Request;
use sccventas\Cliente;
use sccventas\Categoria;
use sccventas\Http\Requests;
use sccventas\Http\Controllers\Controller;
use sccventas\Articulo;
use sccventas\Paquete;
use sccventas\Empaquetado;
use sccventas\Venta;
use sccventas\Vendido;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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

    public function paquete()
    {
        $clientes=new Cliente;
        $clientes = $clientes->get();
        $categorias= new Categoria;
        $categorias= $categorias->get();
        return view('paquetes')->with('clientes',$clientes)->with('categorias',$categorias);
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

    public function cargarcliente()
    {
        $id = $_POST['id'];
        $clientes = Cliente::find($id);
        $html='<div class="table table-responsive">
<table class="table table-hover">
    <th>
    <label class="label label-primary">Nombre</label>
  </th>
  <th>
    <label class="label label-success">Direccion</label>
  </th>
  <th>
    <label class="label label-danger">Telefono</label>
  </th>
  <th>
    <label class="label label-warning">E-mail</label>
  </th><tr><td>'.$clientes->NOM_CLI.' '.$clientes->APA_CLI.' '.$clientes->AMA_CLI.'</td><input type="hidden" name="id_cli" id="id_cli" value="'.$clientes->id.'"><td>'.$clientes->DIR_CLI.'</td>'.'<td>'.$clientes->TEL_CLI.'</td>'.'<td>'.$clientes->EMA_CLI.'</td></tr></table>
</div>';

        echo $html;

    }

    public function cargarcliente2()
    {
        $id = $_POST['id'];
        $clientes = Cliente::find($id);
        $html='<div class="table table-responsive">
<table class="table table-hover">
    <th>
    <label class="label label-primary">Nombre</label>
  </th>
  <th>
    <label class="label label-warning">E-mail</label>
  </th><tr><td>'.$clientes->NOM_CLI.' '.$clientes->APA_CLI.' '.$clientes->AMA_CLI.'</td><input type="hidden" id="destinatario" name="destinatario" value="'.$clientes->EMA_CLI.'">'.'<td>'.$clientes->EMA_CLI.'</td></tr></table>
</div>';

        echo $html;

    }

    public function cargarproductos()
    {
        $id = $_POST['id'];
        $productos = Articulo::where('ID_CAT','=',$id)->get();
        $i=1;

        $html2 ='
        <table id="example2" class="display table table-hover"  >
    <thead>
        <tr class="info">
            <th><label class="label label-success">Titulo</label> </th>
            <th><label class="label label-primary">Precio</label></th>
            <th><label class="label label-danger">Agregar</label></th>
        </tr>
    </thead>';
    foreach ($productos as $producto) {
        $html2=$html2.'<tr><td>'.$producto->TIT_ART.'</td>'.'<td>'.$producto->PRE_ART.' Bs.</td>'.'<td><a href="#" onclick="javascript:agregavalor('."'".$producto->TIT_ART."',"."'".$producto->PRE_ART."','".$producto->id."'".')" data-dismiss="modal" class="btn btn-success btn-circle btn-lg2"><i class="fa fa-plus"></i></a></td></tr>';
    }

    $html2=$html2.'</table>';
    echo "<script type='text/javascript' language='javascript' class='init'>";
         echo "function elimina(data)";
         echo "{";
         echo "$('#'+data+'"."').remove();";
          echo "var yea=document.getElementById('tabla').rows.length;";
          echo "var total=0;";
          echo "var name3 = 'sub_pro[]';";
          echo "var campo=document.getElementsByName(name3);";

          echo "for (i = 0; i < yea; i++) { ";
          echo "total = total + parseFloat(campo[i].value);";
          echo "}";
          echo "$('#total').val('+total+')";
         echo "}";

    echo "</script>";
        echo "<script type='text/javascript' language='javascript' class='init'>";
        echo "$(document).ready(function() {";
        echo "$('#example2').DataTable();";
        echo "});";
         echo "</script>";
         echo "<script type='text/javascript' language='javascript' class='init'>";
         echo "var cont=0;";
        echo 'function agregavalor(data1,data2,data3){';
        echo "cont++;";
        echo "var name = 'pre_pro[]';";
        echo "var name2 = 'can_pro[]';";
        echo "var name3 = 'sub_pro[]';";
        echo 'var fila="<tr id=fila"+cont+" ><td>"+data1+" <input  type="+"hidden"+" name="+"idproducto"+"[] value="+data3+"></td><td><input type='."'text' readonly='yes' class='form-control' ".'value="+data2+" name="+"pre_pro"+"[]></td><td><input required class="+"form-control"+" type="+"number"+" id="+"can_pro"+" min="+"1"+" name="+"can_pro"+"[]></td><td class="+"info"+"><input class="+"form-control"+" readonly="+"yes"+" type="+"number"+" name="+"sub_pro"+"[]></td><td><button type="+"button"+" class='."'btn btn-danger btn-circle btn-lg2' "."onclick=javascript:elimina('fila".'"+cont+"'."') title='Eliminar'><i class='fa fa-minus'></i></button>'".'</td></tr>";

            $('."'#tabla'".').append(fila);';
        echo "$('#idproducto').val(data3);";
        echo "$('#producto').val(data1);";
        echo "$('#pre_pro').val(data2);";

           echo "var yea=document.getElementById('tabla').rows.length;";
    echo "yea--;";
    echo "var total=0;";
    echo "var campo=document.getElementsByName(name3);";
     echo "var precio=document.getElementsByName(name);";
    echo "var cantidad=document.getElementsByName(name2);";
    echo "$(document.getElementsByName('can_pro[]')).change(function(){";
    echo "for (i = 0; i < yea; i++) { ";
    echo "campo[i].value = parseFloat(cantidad[i].value) * parseFloat(precio[i].value);";
    echo "}";
    echo"});";
    echo "$(document.getElementsByName('can_pro[]')).change(function(){";
        echo "var total=0;";
    echo "for (i = 0; i < yea; i++) { ";
    echo "  total = total + parseFloat(campo[i].value);";
    echo "}";
    $abc='"<div class=';
    $abc2="'form-group'><label class='col-lg-4 control-label'>TOTAL</label><div class='col-lg-4'><input class='form-control col-lg-2' margin-top:0; float:right;' type='text' readonly='readonly' id='total' value='";
    $abc3='"+total+"';
    $abc4="' ></div><label class='col-sm-1 control-label'>---BS</label></div>";
    $abc5='";';
    echo "document.getElementById('demo').innerHTML = ".$abc.$abc2.$abc3.$abc4.$abc5;
    echo"});";

    echo '}';

        echo "</script>";

     //   dd($html2);
        echo $html2;


    }


    public function cargarproductos2()
    {
        $id = $_POST['id'];
        $productos = Articulo::where('ID_CAT','=',$id)->get();
        $i=1;

        $html2 ='
        <table id="example2" class="display table table-hover"  >
    <thead>
        <tr class="info">
            <th><label class="label label-success">Titulo</label> </th>

            <th><label class="label label-danger">Agregar</label></th>
        </tr>
    </thead>';
    foreach ($productos as $producto) {
        $html2=$html2.'<tr><td>'.$producto->TIT_ART.'</td>'.'<td><a href="#" onclick="javascript:agregavalor('."'".$producto->TIT_ART."',"."'".$producto->PRE_ART."','".$producto->id."'".')" data-dismiss="modal" class="btn btn-success btn-circle btn-lg2"><i class="fa fa-plus"></i></a></td></tr>';
    }

    $html2=$html2.'</table>';
    echo "<script type='text/javascript' language='javascript' class='init'>";
         echo "function elimina(data)";
         echo "{";
         echo "$('#'+data+'"."').remove();";
          echo "var yea=document.getElementById('tabla').rows.length;";
          echo "var total=0;";
          echo "var name3 = 'sub_pro[]';";
          echo "var campo=document.getElementsByName(name3);";

          echo "for (i = 0; i < yea; i++) { ";
          echo "total = total + parseFloat(campo[i].value);";
          echo "}";
          echo "$('#total').val('+total+')";
         echo "}";

    echo "</script>";
        echo "<script type='text/javascript' language='javascript' class='init'>";
        echo "$(document).ready(function() {";
        echo "$('#example2').DataTable();";
        echo "});";
         echo "</script>";
         echo "<script type='text/javascript' language='javascript' class='init'>";
         echo "var cont=0;";
        echo 'function agregavalor(data1,data2,data3){';
        echo "cont++;";
        echo "var name = 'pre_pro[]';";
        echo "var name2 = 'can_pro[]';";
        echo "var name3 = 'sub_pro[]';";
        echo 'var fila="<tr id=fila"+cont+" ><td>"+data1+" <input  type="+"hidden"+" name="+"idproducto"+"[] value="+data3+"></td><td><button type="+"button"+" class='."'btn btn-danger btn-circle btn-lg2' "."onclick=javascript:elimina('fila".'"+cont+"'."') title='Eliminar'><i class='fa fa-minus'></i></button>'".'</td></tr>";

            $('."'#tabla'".').append(fila);';
        echo "$('#idproducto').val(data3);";
        echo "$('#producto').val(data1);";
        echo "$('#pre_pro').val(data2);";

           echo "var yea=document.getElementById('tabla').rows.length;";
    echo "yea--;";
    echo "var total=0;";
    echo "var campo=document.getElementsByName(name3);";
     echo "var precio=document.getElementsByName(name);";
    echo "var cantidad=document.getElementsByName(name2);";
    echo "$(document.getElementsByName('can_pro[]')).change(function(){";
    echo "for (i = 0; i < yea; i++) { ";
    echo "campo[i].value = parseFloat(cantidad[i].value) * parseFloat(precio[i].value);";
    echo "}";
    echo"});";
    echo "$(document.getElementsByName('can_pro[]')).change(function(){";
        echo "var total=0;";
    echo "for (i = 0; i < yea; i++) { ";
    echo "  total = total + parseFloat(campo[i].value);";
    echo "}";
    $abc='"<div class=';
    $abc2="'form-group'><label class='col-lg-4 control-label'>TOTAL</label><div class='col-lg-4'><input class='form-control col-lg-2' margin-top:0; float:right;' type='text' readonly='readonly' id='total' value='";
    $abc3='"+total+"';
    $abc4="' ></div><label class='col-sm-1 control-label'>---BS</label></div>";
    $abc5='";';
    echo "document.getElementById('demo').innerHTML = ".$abc.$abc2.$abc3.$abc4.$abc5;
    echo"});";

    echo '}';

        echo "</script>";

     //   dd($html2);
        echo $html2;


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
      $query= Venta::join('vendidos','ID_VEN','=','ventas.id')->join('clientes','ID_CLI','=','clientes.id')->join('articulos','ID_PRO','=','articulos.id')->join('categorias','ID_CAT','=','categorias.id')->orderBy('FEC_VEN','ASC')->get();
      //dd($query);
       $pdf = new TCPDF('L','mm', 'LETTER', true, 'UTF-8', false);
       $pdf->SetTitle('Reporte general de ventas');
       $pdf->setPrintHeader(false);
       $pdf->setPrintFooter(false);
       $pdf->SetAutoPageBreak(TRUE, 0);
       $pdf->AddPage();
       $pdf->Image('img/pdf.jpg', 185, 1, 95, 25, 'JPG', '', '', true, 720, '', false, false, false, false, false, false);
       $pdf->SetFont('','B','13');
         $pdf->SetXY(70, 30);
         $pdf->Write(0,'REPORTE DE VENTAS - SISTEMA CRISTIANO DE COMUNICACIONES','','',false);
         $pdf->SetXY(15, 30);
         $html =
         '<style>
       h1 {
           color: navy;
           font-family: times;
           font-size: 24pt;
           text-decoration: underline;
       }
       p.first {
           color: #003300;
           font-family: helvetica;
           font-size: 12pt;
       }
       p.first span {
           color: #006600;
           font-style: italic;
       }
       p#second {
           color: rgb(00,63,127);
           font-family: times;
           font-size: 12pt;
           text-align: justify;
       }
       p#second > span {
           background-color: #FFFFAA;
       }
       th.first {
           color: #003300;
           font-family: helvetica;
           font-size: 8pt;

           background-color: #ccffcc;
       }
       th.first-danger {
           color: maroon;
           font-family: helvetica;
           font-size: 6px;
           font-strecht: bold;
           background-color: #ff6066;
       }
       th.second {
           color: #6c3300;
           font-family: helvetica;
           font-size: 8pt;

           background-color: #fbdb65;
       }
       tr.title{
           background-color: #bfcfe4;
       }
       td {
           border: 2px solid blue;
           background-color: #ffffee;
       }
       td.second {
           border: 2px dashed green;
       }
       div.test {
           color: #000;
           background-color: #bab3b2;
           font-family: helvetica;
           font-size: 10pt;
           border-style: solid solid solid solid;
           border-width: 1px 1px 1px 1px;
           margin-top: 100pt;
           text-align: center;
       }
       tr.title2{
           background-color: #74e76a;
       }
       .datos{
         border: 1px #000 solid;
       }
       .lowercase {
           text-transform: lowercase;
       }
       .uppercase {
           text-transform: uppercase;
       }
       .capitalize {
           text-transform: capitalize;
       }
   </style>
      <font size="7"> <br/><br/><br/><br/><table class ="datos" border="1" cellspacing="0" cellpadding="3">
     <tr class="title" rowspan="1">
     <th rowspan="1" align="center" width="2%"><b>Nº</b></th>
     <th rowspan="1" align="center" width="13%"><b>CLIENTE</b></th>
     <th rowspan="1" align="center" width="9%"><b>DEPARTAMENTO <br/> Y DOMICILIO</b></th>
     <th rowspan="1" align="center" width="6%"><b>TELEFONO</b></th>
     <th padding="5" rowspan="1" align="center" width="12%"><b>E-MAIL </b></th>
     <th rowspan="1" align="center" width="7%"><b>FECHA <br/> DE VENTA</b></th>
     <th rowspan="1" align="center" width="7%"><b>Nº DE FACTURA</b></th>
     <th align="center"  width="15%"><b>TITULO DEL ARTICULO </b></th>
     <th align="center"  width="2%"><b>P</b></th>
     <th align="center"  width="2%"><b>D<br/>A</b></th>
     <th align="center"  width="2%"><b>M<br/>U </b></th>
     <th align="center"  width="2%"><b>H<br/>M </b></th>
     <th align="center"  width="2%"><b>G<br/>F</b></th>
     <th align="center"  width="2%"><b>H<br/>D</b></th>
     <th align="center"  width="2%"><b>C</b></th>
     <th align="center"  width="2%"><b>P<br/>Q</b></th>
     <th align="center"  width="5%"><b>SUB<br/>COSTO</b></th>
     <th align="center" class="first-danger" width="3,5%"><b>D<br/>25%</b></th>
     <th align="center"  width="5%"><b>COSTO<br/>TOTAL EN BS.</b></th>
     </tr>
     ';
     $pr=0;
     $da=0;
     $mu=0;
     $hm=0;
     $gf=0;
     $hd=0;
     $co=0;
     $pq=0;
     $st=0;
     $dct=0;
     $to=0;
      foreach ($query as $key => $q) {
     $html=$html.'<tr class="cuerpo"><th>'.($key+1).'</th>
     <th>'.$q->NOM_CLI.' '.$q->APA_CLI.' '.$q->AMA_CLI.'</th>
     <th>'.$q->DIR_CLI.'</th>
     <th>'.$q->TEL_CLI.'</th>
     <th>'.$q->EMA_CLI.'</th>
     <th>'.Carbon::createFromFormat('Y-m-d',$q->FEC_VEN)->format('d - m - Y').'</th>
     <th>'.$q->FAC_VEN.'</th>
     <th>'.$q->TIT_ART.'</th>
     <th>';
     if($q->ID_CAT==15)
     {
       $html=$html.$q->CAN_VND;
       $pr=$pr+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     if($q->ID_CAT==16)
     {
       $html=$html.$q->CAN_VND;
       $da=$da+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     if($q->ID_CAT==17)
     {
       $html=$html.$q->CAN_VND;
       $mu=$mu+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     if($q->ID_CAT==18)
     {
       $html=$html.$q->CAN_VND;
       $hm=$hm+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     if($q->ID_CAT==20)
     {
       $html=$html.$q->CAN_VND;
       $gf=$gf+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     if($q->ID_CAT==21)
     {
       $html=$html.$q->CAN_VND;
       $hd=$hd+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     if($q->ID_CAT==24)
     {
       $html=$html.$q->CAN_VND;
       $co=$co+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     if($q->ID_CAT==25)
     {
       $html=$html.$q->CAN_VND;
       $pq=$pq+$q->CAN_VND;
     }
     $html=$html.'</th>
     <th>';
     $abi=($q->PRE_ART*$q->CAN_VND);
     $st=$st+$abi;
     $html=$html.$abi.'</th>
     <th class="first-danger">';
     if($q->ID_CLI==2)
     {
       $dc=($q->CAN_VND*$q->PRE_ART*0.25);
       $dct=$dct+$dc;
       $html=$html.$dc;
     }else
     {
       $dc=0;
       $html=$html.'0';
     }
     $html=$html.'</th>
     <th>';
     $ab=($q->CAN_VND * $q->PRE_ART)-$dc;
     $to=$to+$ab;
     $html=$html.$ab.'</th></tr>';
    }
     $html=$html.'<tr class="title2">
       <th colspan="8"><font size="14">SUBTOTAL</font></th>
       <th>'.$pr.'</th>
       <th>'.$da.'</th>
       <th>'.$mu.'</th>
       <th>'.$hm.'</th>
       <th>'.$gf.'</th>
       <th>'.$hd.'</th>
       <th>'.$co.'</th>
       <th>'.$pq.'</th>
       <th>'.$st.'</th>
       <th>'.$dct.'</th>
       <th>'.$to.'</th>
     </tr>
     </table>';

     $pdf->writeHTML($html, true, false, true, false, '');
       $pdf->Output('reporteventas.pdf');

    }

    public function regpaquete(Request $request)
    {
        $paquete = new Paquete;
        $articulo= new Articulo;
        $articulo->TIT_ART=$request->input('nom_paq');
        $articulo->PRE_ART= $request->input('pre_paq');
        $articulo->ID_CAT=25;
        $articulo->ID_MAT=0;
        $articulo->save();
        $paquete->NOM_PAQ = $request->input('nom_paq');
        $paquete->PRE_PAQ = $request->input('pre_paq');
        $paquete->ID_USU = Auth::user()->id;
        $paquete->save();
        $j=count($request->input('idproducto'));
        for($i=0; $i<$j; $i++)
        {
          $empaquetados= new Empaquetado;
          $empaquetados->ID_ART=$request->input('idproducto.'.$i);
          $empaquetados->ID_PAQ=$paquete->id;
          $empaquetados->save();
        }
        $mensaje="Paquete registrado correctamente";
        return redirect()->route('registrarpaquete')->with('mensaje',$mensaje);
    }

    public function regventas(Request $request)
    {
        $ventas = new Venta;
        $ventas->FEC_VEN=$request->input('fec_ven');
        $ventas->FAC_VEN= $request->input('fac_ven');
        $ventas->ID_CLI=$request->input('id_cli');
        $ventas->ID_USU = Auth::user()->id;
        $ventas->save();
        $j=count($request->input('idproducto'));

        for($i=0; $i<$j; $i++)
        {
          $vendidos= new Vendido;
          $vendidos->CAN_VND=$request->input('can_pro.'.$i);
          $vendidos->ID_PRO=$request->input('idproducto.'.$i);
          $vendidos->ID_VEN=$ventas->id;
          $vendidos->save();
        }
        $mensaje="Venta registrada correctamente";
        return redirect()->route('ventas.index')->with('mensaje',$mensaje);
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
