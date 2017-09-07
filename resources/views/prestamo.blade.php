@extends ('layout')
@section('title')
	Registro de prestamo de material - Sistema cristiano de comunicaciones
@endsection
	@section ('cuerpo')
	<div class="panel panel-info cuerpo">
  <div class="panel-heading titleform" >REGISTRO DE PRESTAMO DE MATERIAL - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Prestamo</legend>
<div style="width:15%;">
<button class = "btn btn-success" data-toggle = "modal" data-target = "#myModal"> <span class="glyphicon glyphicon-plus"></span>
  Nuevo Prestamo
</button></div>
</br>
<div style="width:90%; margin-left:5%; ">
<table id="example" class="table table-hover" style="float:left;">
	<thead >
		<tr>
			<th width="25%">NOMBRE</th>
			<th width="8%">FECHA <br/> INICIAL</th>
      <th width="7%">FECHA <br/> FINAL</th>
			<th width="35%">MATERIAL</th>
			<th width="5%">ESTADO</th>
			<th width="5%"data-orderable="false">ACCION</th>
		</tr>
	</thead>

	<tbody style="font-size:11px;">
		<?php if(count($prestamos)>0){?>
      <tr>
      <?php
			foreach ($prestamos as $prestamo):
				if($prestamo->EST_PRE==0){
					$estado='PENDIENTE';
					}else{
						$estado='ENTREGADO';
						}?>
						<th><?php echo $prestamo->NOM_PRE;?></th>
						<th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $prestamo->FIN_PRE)->format('Y-m-d');?></th>
            			<th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $prestamo->FFN_PRE)->format('Y-m-d');?></th>
            			<th><?php echo $prestamo->MAT_PRE.' <br/>---Observaciones ---'.$prestamo->OBS_PRE;?></th>
            			<?php if($prestamo->EST_PRE==0){?>
            			<th class="danger"><?php echo $estado;?></th>
            			<?php }else{ ?>
            			<th class="success"><?php echo $estado;?></th>
            			<?php } if($prestamo->EST_PRE==0){?>
            			<th><button type="button" onclick="javascript:enviaid(<?php echo $prestamo->id;?>)" class="btn btn-primary" data-toggle = "modal" data-target = "#myModal2"><span class="glyphicon glyphicon-check"></span> Devolucion</button></th>
						<?php }else{ ?>
						<th>No hay acciones</th>
						<?php } ?>
		</tr>
				<?php	endforeach; }

			?>
	</tbody>
</table>
</div>
</form>
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>

            <h4 class = "modal-title" id = "myModalLabel">
               Nuevo prestamo
            </h4>
         </div>

         <div class = "modal-body">
            <form class="form-horizontal" method="POST" action="registrarprestamos">
            	 <div class="form-group">
    <label for="" class="col-lg-3 control-label">Nombre completo</label>
    <div class="col-lg-8">
      <input type="text" name="nom_pre" class="form-control" required id=""
             placeholder="Nombre del prestatario">
    </div>
  </div>
    <div class="form-group">
    <label for="" class="col-lg-3 control-label">Fecha de entrega</label>
    <div class="col-lg-8">
      <input type="date" class="form-control" required name="ffn_pre" id=""
             min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">

    </div>
    </div>
    <div class="form-group">
    <label for="" class="col-lg-3 control-label">Material</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" required name="mat_pre" id=""
             placeholder="Material que se presto al cliente">

    </div>
    </div>

     <div class="form-group">
    <label for="" class="col-lg-3 control-label">Observaciones</label>
    <div class="col-lg-9">
      <textarea type="text" class="form-control"  name="obs_pre" id=""
             placeholder="Observaciones acerca del material"></textarea>
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
<div class = "modal fade" id = "myModal2" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Devolucion de material
            </h4>
         </div>
         <form action="devolucion" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="id" name="id">
            <div class=" ">¿Esta seguro de cambiar el estado del prestamo?</div>

         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px; "></span>
               Cancelar
            </button>

            <button type = "submit" class = "btn btn-success"><span style="font-size: 10px; " class="glyphicon glyphicon-check"></span>
               Aceptar
            </button>
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
</div>
@stop
@section('script')
	<script type="text/javascript">
		function enviaid(data1){
			$('#id').val(data1);
		}
	</script>
@endsection
