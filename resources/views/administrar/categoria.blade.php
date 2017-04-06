@extends('../layout')
	@section ('cuerpo')
	<div class="panel panel-info cuerpo">
  <div class="panel-heading titleform" >ADMINISTRACION DE CATEGORIAS - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Categorias</legend>
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
</script>
<script type="text/javascript">
	function modificar(data1,data2,data3)
	{
		$('#nomcat').val(data1);
		$('#descat').val(data2);
		$('#idcat').val(data3);
	}
		function eliminar(data)
	{
		$('#ideli').val(data);
	}

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
<div style="width:85%; margin-left:5%; ">
<table id="example" class="display" style="float:left;">
	<thead >
		<tr>
			<th>NOMBRE</th>
			<th>DESCRIPCION</th>
			<th data-orderable="false"> </th>
		</tr>
	</thead>

	<tbody style="font-size:11px;">
		<tr class="table table-hover">
		<?php
					foreach ($categorias as $categoria):
          ?>
						<th><?php echo $categoria->NOM_CAT;?></th>
						<th><?php echo $categoria->DES_CAT;?></th>
						<th style=" width:85px; ">
							<?php if($categoria->id==25){ ?>
								<h1 class="label label-warning">No hay acciones disponibles</label>
							<?php }else{ ?>
								<button data-toggle = "modal" data-target = "#myModal2" onClick="modificar(<?php echo "'$categoria->NOM_CAT'".','."'$categoria->DES_CAT'".','."'$categoria->id"."'";?>);" class="btn btn-primary" title="Modificar categoria"> <span class="glyphicon glyphicon-pencil" style="font-size:12px;"> </span> </button> <button disabled="true" data-toggle = "modal" data-target = "#myModal3" onClick="eliminar(<?php echo $categoria->id;?>);" class="btn btn-danger" title="Eliminar categoria"> <span class="glyphicon glyphicon-trash"  style="font-size:12px;"></span> </button></th>
		</tr>
				<?php	} endforeach;

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
               Modificar categoria
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="modifcat">
				 <input type="hidden" id="idcat" name="idcat" />
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="form-group">
            	<label class="col-lg-3 control-label">Nombre :</label>
         		<div class="col-md-8">
           		 <input placeholder="Nombre de la categoria" required class="form-control" name="nomcat" id="nomcat">
        		</div>
         		</div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Descripcion :</label>
         <div class="col-md-8">
            <input class="form-control"  required placeholder="Descripcion de la categoria" id="descat" name="descat">
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
         <form action="elicat" method="POST">
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







	@stop
