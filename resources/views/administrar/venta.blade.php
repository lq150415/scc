@extends('../layout')
	@section ('cuerpo')
	<div class="panel panel-success cuerpo">
  <div class="panel-heading titleform" >ADMINISTRACION DE VENTAS - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Ventas</legend>
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
</script>
<script type="text/javascript">
	function modificar(data1,data2,data3,data4,data5)
	{
    $('#fecven').val(data1);
    $('#facven').val(data2);
    $("#tags option[value="+data4+"]").prop("selected","selected");
	}
		function eliminar(data)
	{
		$('#ideli').val(data);
	}
  $("#tags").change(function () {
          $("#tags option:selected").each(function () {
           id = $(this).val();
           $.post("cargarcliente3", { id: id }, function(data){
               $("#datoscl").html(data);
           });
       });
      });
</script>
         <?php if (Session::has('mensaje2')):
            ?>
                  <div class="mensajewarning alert alert-danger" ><label><?php echo Session::get('mensaje2');?></label></div>
         <?php endif;?>
         <?php if (Session::has('mensaje')):
            ?>
                  <div class="mensajewarning alert alert-success"><label><?php echo Session::get('mensaje');?></label></div>
         <?php endif;?>
</br>
<div style="width:100%; margin-left:5%; ">
<table id="example" class="display" style="float:left;">
	<thead >
		<tr>
			<th>FECHA DE VENTA</th>
			<th>FACTURA</th>
      <th>CLIENTE</th>
      <th width="15%" data-orderable="false"> </th>
		</tr>
	</thead>

	<tbody style="font-size:11px;">
		<tr class="table table-hover">
		<?php
					foreach ($ventas as $venta):
          ?>
						<th><?php echo $venta->FEC_VEN;?></th>
            <th><?php echo $venta->FAC_VEN;?></th>
            <th><?php echo $venta->NOM_CLI.' '.$venta->APA_CLI.' '.$venta->AMA_CLI;?></th>
            <th style=" width:85px; ">
								<button data-toggle = "modal" data-target = "#myModal2" onClick="modificar(<?php echo "'$venta->FEC_VEN'".','."'$venta->FAC_VEN'".','."'$venta->NOM_CLI".' '."$venta->APA_CLI".' '."$venta->AMA_CLI'".','."'$venta->ID_CLI'".','."'$venta->id"."'";?>);" class="btn btn-primary" title="Modificar datos de venta"> <span class="glyphicon glyphicon-pencil" style="font-size:12px;"> </span> </button> <button disabled="true" data-toggle = "modal" data-target = "#myModal3" onClick="eliminar(<?php echo $venta->id;?>);" class="btn btn-danger" title="Eliminar venta"> <span class="glyphicon glyphicon-trash"  style="font-size:12px;"></span> </button> </th>
              </tr>

				<?php endforeach;
        ?>

	</tbody>
</table>
</div>
</fieldset>
<!-- Modal -->
 <div class = "modal fade" id = "myModal2" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>

            <h4 class = "modal-title" id = "myModalLabel">
               Modificar venta
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="modifven">
				 <input type="hidden" id="idven" name="idven" />
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">Fecha de venta</label>
          <div class="col-lg-9">
            <input type="date" name="fecven"  class="form-control" id="fecven">
          </div>
        </div>
         <div class="form-group">
          <label for="ejemplo_password_3" class="col-lg-3 control-label">Numero de factura</label>
          <div class="col-lg-9">
            <input type="number" name="facven"  class="form-control" id="facven"
                   >
          </div>
          </div>

          <div id="vendido">
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
               Confirmar eliminacion
            </h4>
         </div>
         <form action="elicli" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="ideli" name="ideli">
            <div class=" ">Desea eliminar el elemento?</div>

         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px; "></span>
               Cancelar
            </button>

            <button type = "submit" class = "btn btn-primary"> <span style="font-size: 10px; " class="glyphicon glyphicon-plus"></span>
               Aceptar
            </button>
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
  </div>
</div>
<div class = "modal fade" id = "myModal4" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Cambio de contraseña de usuario
            </h4>
         </div>
         <form action="mcousu" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="idcon" name="idcon">
         <div class="form-group">
              <label class="col-lg-3 control-label">Nueva contraseña :</label>
            <div class="col-md-8">
               <input type="password" required class="form-control" name="conusu" id="conusu">
            </div>
            </div>
         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px; "></span>
               Cancelar
            </button>

            <button type = "submit" class = "btn btn-primary"> <span style="font-size: 10px; " class="glyphicon glyphicon-plus"></span>
               Aceptar
            </button>
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
  </div>
</div>







	@stop
