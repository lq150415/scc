<?php

namespace sccventas\Http\Controllers;
use TCPDF;
use PDF;
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
use Jenssegers\Date\Date;
use sccventas\Hoja;
use sccventas\Programacion;
use Datetime;

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
     public function cargarmaterial()
     {
       if(isset ($_POST['cod_mat']))
       {
         $mat= new Material;
         $mat->COD_MAT= $_POST['cod_mat'];
         $mat->TIT_MAT= $_POST['tit_mat'];
         $mat->DUR_MAT= $_POST['dur_mat'];
         $mat->save();
       }
       $materiales= Material::where('id','!=',0)->get();
       $html2 ='
       <button class="btn btn-danger" type="button" data-toggle = "modal" data-target = "#myModal">Registro rapido</button>
       <br/><br/>
        <table id="example2" class="display table table-hover">
          <thead>
            <tr class=" ">
              <th width="10%"><label class="label label-success">Codigo</label> </th>
              <th width="10%"><label class="label label-primary">Material</label></th>
              <th width="10%"><label class="label label-warning">Duracion</label></th>
              <th width="10%"><label class="label label-danger">Accion</label></th>
            </tr>
          </thead>';
        foreach ($materiales as $material) {
              $html2=$html2.'<tr><td>'.$material->COD_MAT.'</td>'.'<td>'.$material->TIT_MAT.'</td>'.'<td>'.$material->DUR_MAT.'</td><td><button type="button" class="btn btn-success"   onclick="javascript:nuevo('."'".$material->id."','".$material->COD_MAT."','".$material->TIT_MAT."','".$material->DUR_MAT."','".$material->COD_MAT."'".');">Agregar</button></td></tr>';
          }
          $html2=$html2.'</tr></table>';
        echo $html2;
        echo "<script type='text/javascript' language='javascript' class='init'>";
        echo "$(document).ready(function() {";
        echo "$('#example2').DataTable();";
        echo "});";
         echo "</script>";
     }
     public function pdfhoja(Request $request)
     {
       $verifica=Hoja::orderBy('id','DESC')->first();
       if($verifica->FIN_HOJ==0)
       {
         $hoja= Hoja::find($verifica->id);
         $registros=Programacion::where('ID_HOJ','=',$hoja->id)->get();
         foreach($registros as $registro)
         {
           $borrar= Programacion::find($registro->id);
           $borrar->delete();
         }
         $cont=count($request->input('id_mat'));
         for($i=0;$i<$cont; $i++)
         {
           $programacion= new Programacion;
           $programacion->PIV_PRO=$request->input('piv_pro.'.$i);
           $programacion->POS_PRO= $i+1;
           $programacion->OBS_PRO=$request->input('obs_pro.'.$i);
           $programacion->ID_MAT=$request->input('id_mat.'.$i);
           $programacion->ID_HOJ=$hoja->id;
           $programacion->save();
         }
       }
       else{
       $hoja= new Hoja;
       $hoja->FEC_HOJ= $request->input('fec_hoj');
       $hoja->FIN_HOJ= 0;
       $hoja->save();
       //dd($request->input('piv_pro.1'));
       $cont=count($request->input('id_mat'));
       for($i=0;$i<$cont; $i++)
       {
         $programacion= new Programacion;
         $programacion->PIV_PRO=$request->input('piv_pro.'.$i);
         $programacion->POS_PRO= $i+1;
         $programacion->OBS_PRO=$request->input('obs_pro.'.$i);
         $programacion->ID_MAT=$request->input('id_mat.'.$i);
         $programacion->ID_HOJ=$hoja->id;
         $programacion->save();
       }
     }
        $deploy=Programacion::where('ID_HOJ','=',$hoja->id)->join('material','material.id','=','ID_MAT')->get();
       //dd($programacion);
       //dd($cont);
       $pdf = new TCPDF('P','mm', 'LETTER', true, 'UTF-8', false);
       $pdf->SetTitle('Hoja de programacion - XTOTV');
       $pdf->setPrintHeader(false);
       $pdf->setPrintFooter(false);

       $pdf->SetAutoPageBreak(TRUE, 0);
       $pdf->AddPage();
       $pdf->SetFont('','B','11');
         $pdf->SetXY(80, 3);
         $pdf->Write(0,'PROGRAMACION XTO TV','','',false);
       $pdf->SetFont('','B','11');
         $pdf->SetXY(85, 8);
         setlocale(LC_TIME, 'es_ES');
         Carbon::setLocale('es');
         $pdf->Write(0,Date::createFromFormat('Y-m-d', $request->input('fec_hoj'))->format('l d, F Y'),'','',false);
         $pdf->Image('img/xto.jpg', 3,3, 18, 13, 'JPG', '', '', true, 1500, '', false, false, 0, false, false, false);
         $pdf->Image('img/xto.jpg', 193,3, 18, 13, 'JPG', '', '', true, 1500, '', false, false, 0, false, false, false);
         $pdf->SetXY(0,2);
         $pdf->SetFont('','','11');
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
         font-family: helvetica;
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
         font-family: helvetica;
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
      <font size="9"> <br/><br/><br/><br/><table class ="datos" border="1" cellspacing="0" cellpadding="3">
     <tr class="title" rowspan="1">
     <th rowspan="1" align="center" width="15%"><b>Hora</b></th>
     <th rowspan="1" align="center" width="10%"><b>Codigo</b></th>
     <th rowspan="1" align="center" width="40%"><b>TITULO DEL PROGRAMA</b></th>
     <th rowspan="1" align="center" width="15%"><b>DURACION</b></th>
     <th padding="5" rowspan="1" align="center" width="20%"><b>OBSERVACIONES </b></th>
     </tr>
     <tr class="title" rowspan="1">
     <th rowspan="1" align="center" width="15%"><b>00:59:00</b></th>

     </tr>';
    $time = '00:59:00';
      foreach($deploy as $dep)
      {

     $html=$html.'<tr rowspan="1">
     <th rowspan="1" align="center" width="15%">';
     if($dep->PIV_PRO=='si')
     {
       $html=$html.'<b>'.$time.'</b>';
     }
     $html=$html.'</th>
     <th rowspan="1" align="center" width="10%">'.$dep->COD_MAT.'</th>
     <th rowspan="1" align="center" width="40%">'.$dep->TIT_MAT.'</th>
     <th rowspan="1" align="center" width="15%">'.$dep->DUR_MAT.'</th>
     <th padding="5" rowspan="1" align="center" width="20%">'.$dep->OBS_PRO.'</th>
     </tr>';
     list($horas,$minutos,$segundos) = explode(':',$time);
     list($horas2,$minutos2,$segundos2)= explode(':',$dep->DUR_MAT);
     $time= date("H:i:s", mktime($horas+$horas2,$minutos+$minutos2,$segundos+$segundos2));
     }
    $html=$html.'</table></font>
     ';
     $pdf->writeHTML($html, true, false, true, false, '');
       $pdf->Output('hojaprogramacion'.$request->input('fec_hoj').'.pdf');

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
