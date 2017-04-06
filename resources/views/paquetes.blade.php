@extends ('layout')
	@section ('cuerpo')
	<script type="text/javascript">
	 $(document).ready(function(){

	 $("#categoria").change(function () {
					 $("#categoria option:selected").each(function () {
						id = $(this).val();
						$.post("cargarproductos2", { id: id }, function(data){
								$("#tablabody").html(data);
						});
				});
			 });
	 });

	</script>
	<div class="panel panel-info cuerpo">
	<div class="panel-heading titleform" >REGISTRO DE PAQUETES </div>
	<div class="panel-body bodyform">

	<!-- Button trigger modal -->

	<script type="text/javascript">

							$(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
							$(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
						</script>
				 <?php if (Session::has('mensaje2')):
						?>
									<div class="mensajewarning alert alert-danger" ><label><?php echo Session::get('mensaje2');?></label></div>
				 <?php endif;?>
				 <?php if (Session::has('mensaje')):
						?>
									<div class="mensajewarning alert alert-success"><label><?php echo Session::get('mensaje');?></label></div>
				 <?php endif;?>
<fieldset>
<div class="table-responsive">
	<legend>DATOS DE PAQUETE</legend>
	<form class="form-horizontal" method="POST" action="regpaquete">
		<table class="table table-hover">
		<th><label class="label label-danger">Nombre del paquete</label></th>
    <th><label class="label label-warning">Precio del paquete</label></th>
    <th> </th>
    <tr>
      <td><input class="form-control" type="text" name="nom_paq"  placeholder="Nombre comercial del paquete" required="yes"></td>
      <td><input class="form-control" type="number" step="0.1" name="pre_paq" placeholder="Precio total del paquete" required="yes"></td>
      <td><button type="button" class="btn btn-success btn-circle btn-lg" data-toggle = "modal" data-target = "#myModal2" title="Agregar producto"><i class="fa fa-plus"></i></button>
</td>
    </tr>
			</table>
				<table id="tabla" class="table table-responsive table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr class="active">

								<th width="50%">Producto</th>

								<th width="2%">&nbsp;</th>
							</tr>
						</thead>


		<!-- fin de código: fila base -->

		<!-- Fila de ejemplo -->

		<!-- fin de código: fila de ejemplo -->


					</table>
		<div id="demo" class="alert alert-danger" style="height: auto;"></div>
          </div>

	<div class="">
		<center>
			<button class="btn btn-success" style="margin-right:5%;"><span class="glyphicon glyphicon-check"></span> Registrar paquete</button>

		</center>
	</div>
</fieldset>

</form>



<div class = "modal fade" id = "myModal2" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
           <td class="eliminar2" style="background-color: transparent;"><button data-dismiss = "modal" title="Cerrar" class="eliminar2 close">&times;</button></td>
            </button>

            <h4 class = "modal-title" id = "myModalLabel">
               Seleccionar productos
            </h4>
         </div>

         <div class = "modal-body">
          <div class="form-group col-lg-9">
            <select class="form-control" id="categoria" name="cat_ven">
              <option value="">Seleccione</option>
                <?php foreach ($categorias as $categoria){
          ?>
          <option value="{{$categoria->id}}">{{$categoria->NOM_CAT}}</option>
          <?php } ?>
            </select>
          </div>
          <br/><br/><br/>
            <div class="col-lg-12" id="tablabody" style="overflow: auto;">

            </div>

         </div>

         <div class = "modal-footer">



         </div>

      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
  </div>
</div>
@stop
