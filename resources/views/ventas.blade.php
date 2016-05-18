@extends ('layout')
	@section ('cuerpo')
	<div class="panel panel-info cuerpo">
  <div class="panel-heading titleform" >REGISTRO DE VENTAS - SCC </div>
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
<div style="width:15%;">
<button class = "btn btn-success" data-toggle = "modal" data-target = "#myModal"> <span class="glyphicon glyphicon-plus"></span>
  Nuevo cliente
</button></div>
</br>
<div style="width:85%; margin-left:5%; ">
<table id="example" class="display" style="float:left;">
	<thead >
		<tr>
			<th>CLIENTE</th>
			<th>TELEFONO</th>
      <th>DIRECCION</th>
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
						<th><?php echo $cliente->TEL_CLI;?></th>
						<th><?php echo $cliente->DIR_CLI;?></th>
						<th><?php echo $cliente->EMA_CLI;?></th>
						<th style=" width:85px; "><button onClick="agregar(<?php echo "'$nom'".','."'$cliente->DIR_CLI'".','."'$cliente->TEL_CLI'".','."'$cliente->EMA_CLI'".','."'$cliente->id'";?>);" class="btn btn-primary"><span class="glyphicon glyphicon-plus" style="font-size:12px;"></span> Agregar</button></th>	
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
</table>
</div>
<div class="table-responsive">
<table class="table">
	<tr class="success">
		<td class="col-lg-2">Nombre Completo: </td><td ><input class="form-group col-lg-10" name="nom_cli" id="nom_cli" type="text" readonly="readonly"></td>
		<td class="col-lg-1">Direccion: </td><td><input class="form-group col-lg-10" type="text" name="dir_cli" id="dir_cli" readonly="readonly"></td>
	</tr>
    <input type="hidden" name="id" id="id">
	<tr class="success">	
		<td class="col-lg-1">Telefono: </td><td><input class="form-group col-lg-10" type="text" name="tel_cli" id="tel_cli" readonly="readonly"></td>
		<td class="col-lg-1">e-mail: </td><td><input class="form-group col-lg-10" type="text" name="ema_cli" id="ema_cli" readonly="readonly"></td>
	</tr>
</table>
</div>
</fieldset>
<fieldset>
<div class="table-responsive">
	<legend>Datos de venta</legend>
	<form class="form-horizontal">
		<table class="table">
			<tr class="warning">
				<td  class="col-lg-3">Fecha de venta</td>
				<td  class="col-lg-3"><input required="yes"class="form-control" type="date"></td>
				<td  class="col-lg-2">Nro de Factura</td>
				<td  class="col-lg-13" ><input class="form-control" type="number" required="yes" placeholder="Nro de factura"></td>
			</tr>
			<tr class="warning">
				<td colspan="2"> 
					<select class="form-control col-md-4" id="cat">
						<option>Seleccione</option>	
						<?php foreach ($categorias as $categoria):
		 					echo '<option value="'.$categoria->id.'">'.$categoria->NOM_CAT.'</option>';
						endforeach?>
					</select>
				</td>
				
        <td ></td>
				<td style="padding-left: 200px;">
					<button class="btn btn-info" id="agregar" type="button" data-toggle = "modal" data-target = "#myModal2"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar producto</button>
				</td>	
				
			</tr>	
			</table>
				<table id="tabla" style="width:70%; margin-left:15%;" class="table table-responsive table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr class="active">
								
								<th>Producto</th>
								<th>Precio</th>
								<th>Cantidad</th>
                <th width="9%" class="info">Subtotal</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody class="table-hover">
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								
								<td><input type="text" class="txtcampo small" id="producto" name="producto[]" style="width:280px;" readonly="readonly"/></td>
								<input type="hidden" class="txtcampo small" id="idproducto" name="idproducto[]" style="width:280px;" readonly="readonly"/>
								<input type="hidden" class="txtcampo small" id="pro_pin" name="pro_pin[]" style="width:280px;" readonly="readonly"/>
								<td><input type="text" class="txtcampo small" id="pre_pro" name="pre_pro[]" style="width:80px;" readonly="readonly"/></td>
                <td><input type="text" id="can_pro" class="txtcampo small" name="can_pro[]" style="width:60px;" readonly="readonly"/></td>
							  <td class="info"><input type="text" class="form-control" id="sub_pro" name="sub_pro[]" readonly="readonly"/></td>
								<td class="eliminar btn btn-danger" ><span class="glyphicon glyphicon-remove"></span>Eliminar</td>								
							</tr>
		<!-- fin de código: fila base -->
 
		<!-- Fila de ejemplo -->
							
		<!-- fin de código: fila de ejemplo -->
 
						</tbody>
					</table>
		<div id="demo" class="alert alert-danger" style="height: auto;"></div>
          </div>

	
	</div>
</fieldset>
<div class="">
	<center>
		<button class="btn btn-success" style="margin-right:5%;"><span class="glyphicon glyphicon-check"></span> Registrar venta</button>
		<button class="btn btn-info"><span class="glyphicon glyphicon-trash"></span> Limpiar campos</button>
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