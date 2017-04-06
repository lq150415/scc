@extends('../layout')
	@section ('cuerpo')
	<div class="panel panel-success cuerpo">
  <div class="panel-heading titleform" >ADMINISTRACION DE USUARIOS - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Usuarios</legend>
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
</script>
<script type="text/javascript">
	function modificar(data1,data2,data3)
	{
		$('#nomusu').val(data1);
		$("#nivusu option[value="+data2+"]").prop("selected","selected");
		$('#idusu').val(data3);
	}
		function eliminar(data)
	{
		$('#ideli').val(data);
	}
  function contra(data)
{
  $('#idcon').val(data);
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
			<th>NICK DE USUARIO</th>
      <th>NIVEL DE USUARIO</th>
			<th data-orderable="false"> </th>
		</tr>
	</thead>

	<tbody style="font-size:11px;">
		<tr class="table table-hover">
		<?php
					foreach ($usuarios as $usuario):
          ?>
						<th><?php echo $usuario->NOM_USU.' '.$usuario->APA_USU.' '.$usuario->AMA_USU;?></th>
						<th><?php echo $usuario->NIC_USU;?></th>
            <th><?php
              if($usuario->NIV_USU==0){
                echo 'ADMINISTRADOR';
              }else{
                echo 'USUARIO COMUN';
              }?> </th>
						<th style=" width:85px; ">
							<?php if($usuario->id==Auth::user()->id){ ?>
								<h1 class="label label-warning">No hay acciones disponibles</h1><th>
							<?php }else{ ?>
								<button data-toggle = "modal" data-target = "#myModal2" onClick="modificar(<?php echo "'$usuario->NIC_USU'".','."'$usuario->NIV_USU'".','."'$usuario->id"."'";?>);" class="btn btn-primary" title="Modificar datos de usuario"> <span class="glyphicon glyphicon-pencil" style="font-size:12px;"> </span> </button> <button onClick="contra(<?php echo $usuario->id;?>);" data-toggle = "modal" data-target = "#myModal4" class="btn btn-warning" title="Modificar contraseña"> <span class="fa fa-key"  style="font-size:12px;"></span> </button> <button data-toggle = "modal" data-target = "#myModal3" onClick="eliminar(<?php echo $usuario->id;?>);" class="btn btn-danger" title="Eliminar usuario"> <span class="glyphicon glyphicon-trash"  style="font-size:12px;"></span> </button> </th>
<?php }?>
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
               Modificar usuario
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="modifusu">
				 <input type="hidden" id="idusu" name="idusu" />
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="form-group">
            	<label class="col-lg-3 control-label">Nick de usuario :</label>
         		<div class="col-md-8">
           		 <input required class="form-control" name="nomusu" id="nomusu">
        		</div>
         		</div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Nivel :</label>
         <div class="col-md-8">
           <select class="form-control" id="nivusu" name="nivusu">
             <option value="0">ADMINISTRADOR</option>
             <option value="1">USUARIO COMUN</option>
           </select>
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
         <form action="eliusu" method="POST">
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
