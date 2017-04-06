@extends ('layout')
	@section ('cuerpo')
	<div class="panel panel-danger cuerpo">
  <div class="panel-heading titleform">ENVIAR PROMOCIONES POR CORREO ELECTRONICO - SCC </div>
  <div class="panel-body bodyform">
		<!-- contenido principal -->

<!-- Button trigger modal -->
<fieldset>

<legend>Clientes</legend>
<!-- contenido principal -->
		<section class=""  id="contenido_principal">

		</section>

	<!-- cargador empresa -->
		<div style="display: none;" id="cargador_empresa" align="center">
				<br>


		 <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

		 <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

			<br>
		 <hr style="color:#003" width="50%">
		 <br>
	 </div>
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });

							$(document).ready(function(){

					    $("#tags").change(function () {
					            $("#tags option:selected").each(function () {
					             id = $(this).val();
					             $.post("cargarcliente2", { id: id }, function(data){
					                 $("#datoscl").html(data);
					             });
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


<div style="width:85%; margin-left:5%; ">
	<div class="form-group col-lg-10" >
	<select class="form-control" id="tags"  name="tags[]" >

	</select>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // inicializamos el plugin
        $('#tags').select2({
            // Activamos la opcion "Tags" del plugin
            tags: true,
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '{{ url("tags2") }}',
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
<div class="form-group col-lg-2" >
<button type="button" class="btn btn-success btn-circle btn-lg" data-toggle = "modal" data-target = "#myModal" title="Nuevo cliente"><i class="fa fa-plus"></i></button>

</div>
</br>


<form  id="f_enviar_correo" name="f_enviar_correo"  action="enviar_correo"  class="formarchivo" enctype="multipart/form-data" method="post" >
  <div id="datoscl"></div>



			 <div class="col-md-12">

				<input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>">

						 <div class="">
							 <div class="box-body">

								 <div class="form-group">
									 <input class="form-control" placeholder="Asunto:" id="asunto" name="asunto">
								 </div>
								 <div class="form-group">
									 <textarea id="contenido_mail" name="contenido_mail" class="form-control" style="height: 200px" placeholder="Escriba el contenido de su mensaje aqui">

									 </textarea>
								 </div>
								 <div class="form-group">
									 <div class="btn btn-default btn-file">
										 <i class="fa fa-paperclip"></i> Adjuntar Archivo
										 <input type="file"  id="file" name="file" class="email_archivo" >
									 </div>
									 <p class="help-block"  >Max. 20MB</p>
									 <div id="texto_notificacion">

									 </div>
								 </div>



							 </div><!-- /.box-body -->
							 <div class="box-footer">
								 <div class="pull-right">
									 <a href="email2" class="btn btn-default" ><i class="fa fa-group"></i> ENVIO MASIVO</a>
									 <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ENVIAR</button>
								 </div>
							<br/>
							 </div><!-- /.box-footer -->
						 </div><!-- /. box -->

				 </form>
			 </div><!-- /.col -->
		 </div><!-- /.row -->


<script>

 function activareditor(){
	 $("#contenido_mail").wysihtml5();
 };

 activareditor();
</script>
</fieldset>


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
