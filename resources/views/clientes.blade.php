@extends ('layout')
	@section ('cuerpo')
	<div class="panel panel-info cuerpo">
  <div class="panel-heading titleform" >REGISTRO DE CLIENTES - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Datos del cliente</legend>
<div >
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
       @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	 <form class="form-horizontal" action="registrarcliente" method="POST">
            	 <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombre</label>
    <div class="col-lg-9">
      <input type="text" name="nom_usu" value="<?=old("nom_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder="Nombre del cliente">
    </div>
  </div>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-3 control-label">Apellido paterno</label>
    <div class="col-lg-9">
      <input type="text" name="apa_usu" value="<?=old("apa_usu")?>" class="form-control" id="ejemplo_password_3" 
             placeholder="Apellido paterno">
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Apellido materno</label>
    <div class="col-lg-9">
      <input type="text" name="ama_usu" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Apellido materno">
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Telefono</label>
    <div class="col-lg-9">
      <input type="tel" value="<?=old("tel_usu")?>" name="tel_usu" class="form-control" id="ejemplo_email_3"
             placeholder="Telefono del cliente">

    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">E-mail</label>
    <div class="col-lg-9">
      <input type="email" name="ema_usu" value="<?=old("ema_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder="Direccion e-mail del cliente">

    </div>
    </div>

    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Direccion</label>
    <div class="col-lg-9">
    <textarea type="text" name="dir_usu" value="<?=old("dir_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder="Direccion de cliente"></textarea>
    </div>
    </div>
     <div class = "modal-footer">
            <button type = "submit" class = "btn btn-primary" data-dismiss = "modal"><span class="glyphicon glyphicon-check"></span>
              Registrar cliente
            </button>
            
            <button type = "button" class = "btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
               Limpiar datos
            </button>
         </div>
    </form>
</div>


@stop