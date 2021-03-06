@extends('../layout')
@section('title')
	Administrador - Generos (Area restringida)
@endsection
	@section ('cuerpo')
	<div class="panel panel-success cuerpo">
  <div class="panel-heading titleform" >ADMINISTRACION DE GENEROS - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>GENEROS</legend>
<button type="button"  data-toggle = "modal" data-target = "#myModal" class="btn btn-success">Registrar nuevo genero</button>
</br>
</br>
<div style=" margin-left:5%; ">
<table id="example" class="display" style="float:left;">
	<thead >
		<tr>
			<th>TITULO</th>
			<th>ACTIVO</th>
			<th width="15%" data-orderable="false"> </th>
		</tr>
	</thead>

	<tbody style="font-size:11px;">
		@if (isset($generos))

		<tr class="table table-hover">
		<?php
					foreach ($generos as $gen):
          ?>

            <th><?php echo $gen->titulo;?></th>
            <th
							@if ($gen->activo==1)
								class="success">SI
							@else
								class="danger">NO
							@endif</th>
            <th style=" width:85px; ">
								<button data-toggle = "modal" data-target = "#myModal2" onClick="modificar(<?php echo "'$gen->titulo'".','."'$gen->activo'".','."'$gen->id"."'";?>);" class="btn btn-primary" title="Modificar datos de genero"> <span class="glyphicon glyphicon-pencil" style="font-size:12px;"> </span> </button> <button data-toggle = "modal" data-target = "#myModal3" onClick="eliminar(<?php echo $gen->id;?>);" class="btn btn-danger" title="Eliminar cliente"> <span class="glyphicon glyphicon-trash"  style="font-size:12px;"></span> </button> </th>

              </tr>
				<?php endforeach;
        ?>
			@endif
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
               Modificar genero
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="modifgen">
				 <input type="hidden" id="idgen" name="idgen" />
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">Titulo</label>
          <div class="col-lg-9">
            <input type="text" name="titulo"  class="form-control" id="titulo"
                   placeholder="Nombre del cliente">
          </div>
        </div>
         <div class="form-group">
          <label for="ejemplo_password_3" class="col-lg-3 control-label">Activo</label>
          <div class="col-lg-9">
            <select class="form-control" name="active" id="active">
							<option value="1">SI</option>
							<option value="2">NO</option>
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
</div>
</div><!-- /.modal -->
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
               Registrar genero
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="registrargen">
				 <input type="hidden" id="idgen" name="idgen" />
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">Titulo</label>
          <div class="col-lg-9">
            <input type="text" name="titulo"  class="form-control" id="titulo"
                   placeholder="Titulo del genero">
          </div>
        </div>
         <div class="form-group">
          <label for="ejemplo_password_3" class="col-lg-3 control-label">Activo</label>
          <div class="col-lg-9">
            <select class="form-control" name="active" id="active">
							<option value="1">SI</option>
							<option value="2">NO</option>
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
         <form action="eligen" method="POST">
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

  </div>
</div>
	@stop
@section('script')
	<script type="text/javascript">
		function modificar(data1,data2,data3)
		{
			$('#titulo').val(data1);
			$("#active option[value="+data2+"]").prop("selected","selected");
			$('#idgen').val(data3);
		}
			function eliminar(data)
		{
			$('#ideli').val(data);
		}
	</script>
@endsection
