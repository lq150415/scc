@extends ('layout')
	@section ('cuerpo')
  <script>	
    function compara() { 
    if (document.form1.pas_usu.value != document.form1.conf_pas.value) {
    $(document).ready(function() { setTimeout(function(){ $(".mensajevalidacion").fadeIn(2500); },0500); });
      $(document).ready(function() { setTimeout(function(){ $(".mensajevalidacion").fadeOut(2500); },5000); });
      document.getElementById('mensajevalidacion').innerHTML = '<div class="alert alert-danger mensaje2"> Las contraseñas no coinciden </div>';
    return false; } 
    else {
    return true;
    }
    }
  </script>
  <div class="panel panel-success cuerpo">
  <div class="panel-heading titleform" >REGISTRO DE USUARIOS - SCC </div>
  <div class="panel-body bodyform">

<!-- Button trigger modal -->
<fieldset>
<legend>Datos del usuario</legend>
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

	 <form class="form-horizontal" id="form1" name="form1" action="registrarusuario" method="POST">
    <div id="mensajevalidacion" class="mensajevalidacion"></div>         	 
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombre</label>
    <div class="col-lg-9">
      <input type="text" name="nom_usu" value="<?=old("nom_usu")?>" class="form-control" id="nom_usu"
             placeholder="Nombre del cliente">
    </div>
  </div>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-3 control-label">Apellido paterno</label>
    <div class="col-lg-9">
      <input type="text" name="apa_usu" value="<?=old("apa_usu")?>" class="form-control" id="apa_usu" 
             placeholder="Apellido paterno">
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Apellido materno</label>
    <div class="col-lg-9">
      <input type="text" name="ama_usu" value="<?=old("ama_usu")?>" class="form-control" id="ama_usu"
             placeholder="Apellido materno">
    </div>
    </div>
     <div class="form-group">
              <label class="col-lg-3 control-label">Nivel de usuario :</label>
            <div class="col-lg-9">
              <select class="form-control" name="niv_usu">
          <option value="">SELECCIONE</option>
          <option value="0">Administrador</option>
          <option value="1">Usuario comun</option>
        </select>
               </select>
            </div>
            </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Nick de usuario</label>
    <div class="col-lg-9">
      <input type="tel" name="nic_usu" value="<?=old("nic_usu")?>" class="form-control" id="nic_usu"
             placeholder="CI / NICK DE USUARIO">

    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Contraseña</label>
    <div class="col-lg-9">
      <input type="password" name="pas_usu" class="form-control" id="pas_usu"
             placeholder="Password / contraseña">

    </div>
    </div>

    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Confirmar contraseña</label>
    <div class="col-lg-9">
    <input type="password" name="conf_pas" class="form-control" id="conf_pas"
             placeholder="Repita contraseña"></input>
    </div>
    </div>
     <div class = "modal-footer">
            <button type = "submit" class = "btn btn-primary" onClick="return compara();"><span class="glyphicon glyphicon-check"></span>
              Registrar nuevo usuario
            </button>
            
            <button type = "button" class = "btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
               Limpiar datos
            </button>
         </div>
    </form>
</div>


@stop