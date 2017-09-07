@extends ('layout')
@section('title')
	Registro de ventas - Sistema cristiano de comunicaciones
@endsection
	@section ('cuerpo')

	<div class="panel panel-info cuerpo">
  <div class="panel-heading titleform" >REGISTRO DE VENTAS - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Clientes</legend>
<div style="width:100%;">
<div class="form-group col-lg-10" >
  <select class="form-control" id="tags"  name="tags[]" style="width:100%">

  </select>
  </div>


<div class="form-group col-lg-2" >
<button type="button" class="btn btn-success " data-toggle = "modal" data-target = "#myModal" title="Nuevo cliente"><i class="fa fa-plus"></i> Cliente</button>

</div>

</div>
</br>




</fieldset>
<fieldset>
<div class="table-responsive">
	<form class="form-horizontal" method="POST" action="regventas">

	<div id="datoscl"></div>
		<table class="table table-hover">
		<th><label class="label label-danger">Fecha de venta</label></th>
    <th><label class="label label-warning">Numero de factura</label></th>
    <th> </th>
    <tr>
      <td><input class="form-control" required type="date" name="fec_ven"></td>
      <td><input class="form-control" required type="number" name="fac_ven" placeholder="Numero de factura"></td>
      <td><button type="button" class="btn btn-info" data-toggle = "modal" data-target = "#myModal2" title="Agregar producto"><i class="fa fa-plus"></i> Añadir Producto</button>
</td>
    </tr>
			</table>
				<table id="tabla" class="table table-responsive table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr class="active">

								<th width="50%">Producto</th>
								<th>Precio</th>
								<th width="9%">Cantidad</th>
                <th width="15%" class="info">Subtotal</th>
								<th width="2%">&nbsp;</th>
							</tr>
						</thead>


		<!-- fin de código: fila base -->

		<!-- Fila de ejemplo -->

		<!-- fin de código: fila de ejemplo -->


					</table>
		<div id="demo" class="alert alert-danger" style="height: auto;"></div>
          </div>
	</div>
</fieldset>
<div class="">
	<center>
		<button class="btn btn-success" style="margin-right:5%;"><span class="glyphicon glyphicon-check"></span> Registrar venta</button>

	</center>
</div>
</form>
<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>

            <h4 class = "modal-title" id = "myModalLabel">
               Registro de nuevo cliente
            </h4>
         </div>

         <div class = "modal-body">
            <form class="form-horizontal" method="POST" action="registrarclientes">
            	 <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombre</label>
    <div class="col-lg-9">
      <input type="text" name="nom_usu" class="form-control" id="ejemplo_email_3"
             placeholder="Nombre del cliente">
    </div>
  </div>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-3 control-label">Apellido paterno</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="apa_usu" id="ejemplo_password_3"
             placeholder="Apellido paterno">
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Apellido materno</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="ama_usu" id="ejemplo_email_3"
             placeholder="Apellido materno">
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Telefono</label>
    <div class="col-lg-9">
      <input type="tel" class="form-control" name="tel_usu" id="ejemplo_email_3"
             placeholder="Telefono del cliente">

    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">E-mail</label>
    <div class="col-lg-9">
      <input type="email" class="form-control" name="ema_usu" id="ejemplo_email_3"
             placeholder="Correo electronico del cliente">

    </div>
    </div>

     <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Direccion</label>
    <div class="col-lg-9">
      <textarea type="text" class="form-control" name="dir_usu" id="ejemplo_email_3"
             placeholder="Direccion de cliente"></textarea>
    </div>
    </div>


         </div>

         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
              Cancelar
            </button>

            <button type = "submit" class = "btn btn-primary">
               Guardar
            </button>
            </form>
         </div>

      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
  </div>
</div>


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
              <option value="">Seleccione categoria de producto</option>
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
@section('script')
	<script type="text/javascript">
	 $(document).ready(function(){

	 $("#tags").change(function () {
					 $("#tags option:selected").each(function () {
						id = $(this).val();
						$.post("cargarcliente", { id: id }, function(data){
								$("#datoscl").html(data);
						});
				});
			 });
	 $("#categoria").change(function () {
					 $("#categoria option:selected").each(function () {
						id = $(this).val();
						$.post("cargarproductos", { id: id }, function(data){
								$("#tablabody").html(data);
						});
				});
			 });
	 });

	</script>
	<script type="text/javascript">

							$(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
							$(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
						</script>
	<script type="text/javascript">
		$(document).ready(function () {
				// inicializamos el plugin
				$('#tags').select2({
						// Activamos la opcion "Tags" del plugin
						tags: true,
						tokenSeparators: [','],
						ajax: {
								dataType: 'json',
								url: '{{ url("tags") }}',
								delay: 250,
								data: function(params) {
										return {
												term: params.term
										}
										console.log(params);
								},
								processResults: function (data, page) {
									return {
										results: data
									};
									console.log(data);
								},
						}
				});
		});
	</script>

@endsection
