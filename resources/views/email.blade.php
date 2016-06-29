@extends ('layout')
	@section ('cuerpo')
	<div class="panel panel-danger cuerpo">
  <div class="panel-heading titleform">ENVIAR PROMOCIONES POR CORREO ELECTRONICO - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Clientes</legend>
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


<div style="width:85%; margin-left:5%; ">
<table id="example" class="display" style="float:left;">
	<thead >
		<tr>
			<th>CLIENTE</th>
			<th>E-MAIL</th>
			<th data-orderable="false"> </th>	
		</tr>
	</thead>
	
	<tbody style="font-size:11px;">
		<tr class="table table-hover">
		<?php
					foreach ($clientes as $cliente):
            $nom=$cliente->NOM_CLI.' '.$cliente->APA_CLI.' '.$cliente->AMA_CLI;
            $com="'$nom'";
          ?>
						<th><?php echo $cliente->NOM_CLI.' '.$cliente->APA_CLI.' '.$cliente->AMA_CLI;?></th>
					  <th><?php echo $cliente->EMA_CLI;?></th>
						<th style=" width:85px; "><button onClick="agregar(<?php echo "'$nom'".','."'$cliente->DIR_CLI'".','."'$cliente->TEL_CLI'".','."'$cliente->EMA_CLI'".','."'$cliente->id'";?>);" class="btn btn-primary"><span class="glyphicon glyphicon-plus" style="font-size:12px;"></span> Agregar</button></th>	
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
</table>
</div>
<div style="width:35%; padding-left:30px;">
<button class = "btn btn-warning" data-toggle = "modal" data-target = "#myModal"> <span class="glyphicon glyphicon-envelope"></span>
  Enviar a TODOS
</button></div>
<br/>
<div class="table-responsive">
<form action="test-email" method="POST" class="form-horizontal">
<table class="table">
	<tr class="success">
		<td class="col-lg-2">Nombre Completo: </td><td ><input class="form-control col-lg-10" name="nombre" id="nom_cli" type="text" readonly="readonly"></td>
		<td class="col-lg-1">E-mail: </td><td><input class="form-control col-lg-10" type="text" name="email" id="ema_cli" readonly="readonly"></td>
	</tr>
    <input type="hidden" name="id" id="id">
	<tr class="success" >	
		<td colspan="1" class="col-lg-1">Asunto: </td><td colspan="3"><input class="form-control col-lg-10" type="text" name="subject" id="" ></td>
	</tr>
  <tr class="success">	
    <td class="col-lg-1">Mensaje: </td><td colspan="3"><textarea class="form-control col-lg-10" type="text" name="mensaje" id="" ></textarea></td>
	</tr>
</table>

</div>
</fieldset>

<div class="">
	<center>
		<button class="btn btn-success" type="submit" style="margin-right:5%;"><span class="glyphicon glyphicon-envelope"></span> Enviar email</button>
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
            <div id="tablabody" style="overflow: auto;">
    
            </div>
           
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-success" data-dismiss = "modal"><span class="glyphicon glyphicon-shopping-cart"></span>
              Agregar producto
            </button>
            
           
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
  </div>
</div>







	@stop