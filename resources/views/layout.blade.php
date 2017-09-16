<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
		{!! Html::style('assets/css/bootstrap.css') !!}
		{!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
		{!! Html::style('css/sistemalaravel.css') !!}
		{!! Html::style('assets/css/menulateral.css') !!}
		{!! Html::style('font-awesome-4.6.3/css/font-awesome.min.css') !!}
		{!! Html::style('dist/css/AdminLTE.min.css') !!}
		{!! Html::style('dist/css/skins/_all-skins.min.css') !!}
		{!! Html::style('css/table/jquery.dataTables.css') !!}
		{!! Html::style('select2/css/select2.css') !!}
		{!! Html::style('assets/css/form.css') !!}
		{!! Html::style('css/form.css') !!}
		@yield('css')
</head>

<body class="background2" >
	<div id="imgLOAD" style="text-align:center; position:absolute; cursor: wait; z-index:2">
		<b>Cargando...</b>
		<img src="{{ url('img/cargando.gif') }}" />
	</div>
	<script type='text/javascript'>
		window.onload = detectarCarga;
		function detectarCarga(){
			document.getElementById("imgLOAD").style.display="none";
			document.getElementById("page").style.display="block";

		}
	</script>
	<div class="container-fluid" id="page" style="position:relative;  display: none;">

	@if (Session::has('mensaje2'))
					 <div class="alerta mensajewarning alert alert-danger  alert-dismissable fade in" >
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Alerta!</strong> {{Session::get('mensaje2')}}
					 </div>
	@endif
	@if (Session::has('mensaje'))
					<div class="alerta mensajewarning alert alert-success alert-dismissable fade in" style="">
						 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							 <strong>Exito!</strong> {{Session::get('mensaje')}}
					</div>
	@endif
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid" >

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">SPV - SCC</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home colorspan"></span> Inicio</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks colorspan"> </span> Tareas <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{url('hojaprogramacion')}}">· Elaborar hoja de programacion</a></li>
						<li><a href="{{ url('prestamo')}}">· Realizar prestamo de material</a></li>
						<li><a href="{{ url('email')}}">· Enviar promociones via e-mail a clientes</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks colorspan"> </span> Reportes <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a target="_blank" href="{{ url('pdf') }}">· Reporte general de ventas</a></li>
						<li><a target="_blank" href="{{ url('pdfgeneral') }}">· Datos de ventas</a></li>
						<li><a href="{{ url('graficos') }}">· Cuadros estadisticos de ventas</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Busqueda rapida">
				</div>
				<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span> &nbspBuscar</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user colorspan"> </span> <?php echo $idUsuario = Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU;?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#" data-toggle = "modal" data-target = "#myModal7"><span class="glyphicon glyphicon-bishop colorspan"> </span>· Ver perfil</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-saved colorspan"> </span>· Editar perfil de usuario</a></li>
						<li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-log-out colorspan"> </span>· Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      	<p class="navbar-brand" href="#">Menú</p>
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('clientes')}}">Registrar clientes<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-check colorspan"></span></a></li>
        <li ><a href="{{url('usuarios')}}">Registrar Usuarios<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-plus-sign colorspan"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ventas <span class="caret colorspan"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-shopping-cart colorspan"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{url('ventas')}}">· Registrar venta</a></li>
            <li class="divider"></li>
            <li><a href="{{url('registrarpaquete')}}">· Registrar nuevo paquete</a></li>
            <li class="divider"></li>
            <li><a data-toggle = "modal" data-target = "#myModal3">· Registrar nueva categoria</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle <?php if(Auth::user()->NIV_USU==1):;?>not-active<?php endif;?>" data-toggle="dropdown">Administrar <span class="cog colorspan"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog colorspan"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{ url('adminusu')}}">· Administrar usuarios</a></li>
            <li><a href="{{ url('admincli')}}">· Administrar clientes</a></li>
						<li><a href="{{ url('adminven')}}">· Administrar ventas</a></li>
						<li><a href="{{ url('admingen')}}">· Administrar generos</a></li>
						<li><a href="{{ url('adminart')}}">· Administrar articulos</a></li>
						<li><a href="{{ url('adminpro')}}">· Administrar Procedencia</a></li>
            <li><a href="{{ url('adminpaq')}}">· Administrar paquetes</a></li>
            <li><a href="{{ url('admincat')}}">· Administrar categorias</a></li>
            <li><a href="{{ url('adminmat')}}">· Administrar material</a></li>
            <li><a href="{{ url('adminpub')}}">· Administrar publicidad</a></li>
            <li><a href="{{ url('adminpen')}}">· Pendientes</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{url('material')}}" >Registrar material </span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-dashboard colorspan"></span></a>

        </li>
        <li class="">
          <a href="{{url('publicidad')}}" >Registrar publicidad </span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bullhorn colorspan"></span></a>

        </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultas <span class="caret colorspan"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags colorspan"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">· Por Fechas</a></li>
            <li><a href="#">· Por categoria</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
@yield('cuerpo')
</div>
</div>

 <div class = "modal fade" id = "myModal3" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   <div class = "modal-dialog">
      <div class = "modal-content">
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Registrar nueva categoria
            </h4>
         </div>
         <div class = "modal-body">
          <form class="form-horizontal" method="POST" action="registrarcat">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="form-group">
            	<label class="col-lg-3 control-label">Nombre :</label>
         		<div class="col-md-8">
           		 <input placeholder="Nombre de la categoria" required class="form-control" name="nom_cat">
        		</div>
         		</div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Descripcion :</label>
         <div class="col-md-8">
            <input class="form-control" required placeholder="Descripcion de la categoria" id="" name="des_cat">
         </div>
         </div>
         <input type="hidden" id="idalm">
         <div class = "modal-footer" style="border-top: 0;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px;"></span>
               Cancelar
            </button>
            <button type = "submit" class = "btn btn-primary"><span style="font-size: 10px;" class="glyphicon glyphicon-plus"></span>
               Registrar
            </button>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
</div>
<div class = "modal fade" id = "myModal7" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">
  <div class = "modal-dialog ">
      <div class = "modal-content">
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               <h3>Perfil de usuario</h3>
            </h4>
         </div>
  <form action="" method="POST">
    <div class = "modal-body" style="padding-top:0px;">
    <div class="form-group">
      <input type="hidden" id="id" name="id">

    </div>
    <div class="row">
  <div class="col-sm-4"><img width="100%" height="100%" src="" alt="..." class="img-circle"></div>
    <div class="form-group col-sm-8">
    <label class="control-label label label-primary">Nombre de usuario :</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="nro_fac" id="nro_fac1" class="form-control" value="<?php echo $a=Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU;?>"  readonly placeholder="" onpaste="return false">
    </div>
    </div>
  </div>
  <div class="form-group col-sm-18">
  <div class="form-group col-sm-4" >
    <label class="control-label label label-success">Nick de usuario:</label>
    <div class="col-sm-17">
        <input type="text" value="<?php echo $a=Auth::user()->NIC_USU;?>" style="border:none" min="0" name="nro_fac" id="nro_fac1" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-4" >
    <label class="control-label label label-success">Nivel de usuario:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" value="<?php
        $a=Auth::user()->NIV_USU;
        if($a==0){
        	$a='Administrador general';
        }elseif($a==1){
        	$a='Usuario comun';
        }elseif($a==2){
        	$a='Solicitante';
        }
        echo $a;?>" min="0" name="nro_fac" id="nro_fac1" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-4">
    <label class="control-label label label-success">Antiguedad:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="nro_fac" id="nro_fac1" value="<?php echo $a=Auth::user()->created_at->format('d/M/Y');?>" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
</div>
</div>
  </form>
         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-success" data-dismiss = "modal"><span class="glyphicon glyphicon-ok" style="font-size: 10px; "></span>
               Aceptar
            </button>
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{!! Html::script('js/table/jquery.js') !!}
{!! Html::script('js/table/ajax.js') !!}
{!! Html::script('select2/js/select2.min.js') !!}
{!! Html::script('js/table/jquery.dataTables.js') !!}
{!! Html::script('assets/js/bootstrap.js') !!}
{!! Html::script('js/table/shCore.js') !!}
{!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
{!! Html::script('js/sistemalaravel.js') !!}

	<script type="text/javascript" language="javascript" class="init">
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
	<script type="text/javascript" language="javascript" class="init">
		$(document).ready(function() {
			$('#example2').DataTable();
		});
	</script>
	<script type="text/javascript">
	 var ind=1;
	 var ind2=1;
	$(function(){
		// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
		$("#agregar").on('click', function(){
			if(ind<=1){
				ind=2;
			}else
			{
				ind2++;
				$("#tabla tbody tr:eq(0)").clone().prependTo("#tabla tbody");
			}
		});
		// Evento que selecciona la fila y la elimina
		$(document).on("click",".eliminar",function(){
			if(ind2==1){
				ind--;
				$('#nom_cli').val(' ');
				$('#tel_cli').val(' ');
				$('#dir_cli').val(' ');
				$('#ema_cli').val(' ');
			}else{
			var parent = $(this).parents().get(0);
			$(parent).remove();
			ind2--;
			}
		});
	$(document).on("click",".eliminar2",function(){
			if(ind2==1){
				ind--;
				$('#nom_cli').val(' ');
				$('#tel_cli').val(' ');
				$('#dir_cli').val(' ');
				$('#ema_cli').val(' ');

			}else{
	  document.getElementById("tabla").deleteRow(1);
			ind2--;
			}
		});
	});
	</script>
	<script type="text/javascript">
		function agregar(data1,data2,data3,data4,data5){
			$('#nom_cli').val(data1);
			$('#dir_cli').val(data2);
			$('#tel_cli').val(data3);
			$('#ema_cli').val(data4);
			$('#id').val(data5);
	    }
	</script>
	<script type="text/javascript">
		$("#cat").change(function () {
	           $("#cat option:selected").each(function () {
	            id = $(this).val();
	            $.post("datos_pro", { id: id }, function(data){
	                $("#tablabody").html(data);
	            });
	        });
	            })
	</script>
	<script type="text/javascript">
								$(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },1000); });
								$(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
	</script>
	@yield('script')
</body>
</html>
