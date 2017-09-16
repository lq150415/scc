@extends ('layout')
@section('title')
	Dashboard - Sistema Cristiano de Comunicaciones
@endsection
	@section ('cuerpo')
	<div class="panel bienvenida">
	<div class="panel panel-primary panel1">
  		<div class="panel-body texto1 ">
    	<?php  $ven=\sccventas\Vendido::select(\DB::raw('sum( CAN_VND * PRE_ART) as SUMA'))->join('articulos','ID_PRO','=','articulos.id')->groupBy('ID_VEN')->orderBy('SUMA','DESC')->first();
			if(isset($ven)):
			echo $ven->SUMA;
			endif;?>	Bs.
  		</div>
  	<div class="panel-heading ">MAYOR VENTA</div>
	</div>
	<div class="panel panel-danger panel2">
  		<div class="panel-body texto2">
				<?php  $ven=\sccventas\Vendido::select(\DB::raw('sum( CAN_VND * PRE_ART) as SUMA'))->join('articulos','ID_PRO','=','articulos.id')->first();
				echo $ven->SUMA;?>Bs.
  		</div>
  	<div class=" panel-heading">TOTAL VENTAS</div>
	</div>
	<div class="panel panel-success panel3">
  		<div class="panel-body texto3">
				<?php  $ven=\sccventas\Vendido::select(\DB::raw('sum( CAN_VND) as SUMA ,TIT_ART'))->join('articulos','ID_PRO','=','articulos.id')->first();
				echo $ven->TIT_ART;?>
  		</div>
  	<div class="panel-heading">PRODUCTO MAS VENDIDO	</div>
	</div>
	<div class="panel panel-success panel3">
  		<div class="panel-body ">
    		<p> Bienvenido/a <?php echo $idUsuario = Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU;?> </p>
  		</div>
  	<div class="panel-footer">
  		<?php if(Auth::user()->NIV_USU==0){

  			echo "ADMINISTRADOR";
  		}
  			else
  			{

  			echo "USUARIO";
  			}
   		?>
  	</div>
	</div>
	</div>
	@stop
