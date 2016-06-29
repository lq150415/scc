@extends ('layout')
	@section ('cuerpo')
	<div class="panel panel-info cuerpo">
  <div class="panel-heading titleform" >REGISTRO DE MATERIAL XTO-TV - SCC </div>
  <div class="panel-body bodyform">
<style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>
<!-- Button trigger modal -->
<form class="form-horizontal" action="registrarcliente" method="POST">
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; width:auto; margin-bottom:0px; padding:4px;" > Datos tecnicos</legend>
<div>
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
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Seccion 1</legend>
 <div class="form-group">
    <label for="ejemplo_email_3" class="col-sm-1 control-label">Codigo</label>
    <div class="col-md-2">
      <input type="text" name="nom_usu" value="<?=old("nom_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder="Codigo ">
    </div>
    <label for="ejemplo_email_3" class="col-sm-1 control-label">Titulo</label>
    <div class="col-md-8">
      <input type="text" name="nom_usu" value="<?=old("nom_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder="Titulo del material">
    </div>
  </div>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-4 control-label">Subtitulo</label>
    <div class="col-md-8">
      <input type="text" name="apa_usu" value="<?=old("apa_usu")?>" class="form-control" id="ejemplo_password_3" 
             placeholder="Subtitulo del material">
    </div>
    </div>
</fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Seccion 2</legend>
   	 <div class="form-group">
    <label for="ejemplo_email_3" class="col-sm-1 control-label">Duracion</label>
    <div class="col-sm-2">
      <input type="time"  name="" min="00:00:00"  step="1" value="<?=old("nom_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder="HH:mm:ss">
    </div>
     <label for="ejemplo_email_3" class="col-sm-7 control-label">Cantidad de veces que se emite el video</label>
    <div class="col-sm-2">
      <input type="number" min="0" name="" value="<?=old("nom_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder="Nro">
    </div>
  </div>
</fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Seccion 3</legend>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-sm-2 control-label">Procedencia</label>
    <div class="col-md-4">
      <input type="text" name="apa_usu" value="<?=old("apa_usu")?>" class="form-control" id="ejemplo_password_3" 
             placeholder="Procedencia">
    </div>
    <label for="ejemplo_password_3" class="col-sm-2 control-label">Tipo de archivo</label>
    <div class="col-md-4">
      <input type="text" name="apa_usu" value="<?=old("apa_usu")?>" class="form-control" id="ejemplo_password_3" 
             placeholder="Tipo de archivo">
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_password_3" class="col-sm-2 control-label">Ubicacion</label>
    <div class="col-md-4">
      <input type="text" name="apa_usu" value="<?=old("apa_usu")?>" class="form-control" id="ejemplo_password_3" 
             placeholder="Ubicacion">
    </div>
    <label for="ejemplo_password_3" class="col-sm-2 control-label">Ubicacion Fisica</label>
    <div class="col-md-4">
      <input type="text" name="apa_usu" value="<?=old("apa_usu")?>" class="form-control" id="ejemplo_password_3" 
             placeholder="Ubicacion Fisica">
    </div>
    </div>
    </fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Datos produccion</legend>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-sm-1 control-label">Director</label>
    <div class="col-lg-4">
      <input type="text" name="ama_usu" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Director">
    </div>
    <label for="ejemplo_email_3" class="col-sm-2 control-label">Año de produccion</label>
    <div class="col-md-2">
      <input type="number" name="ama_usu" min="1900" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Año">
    </div>
    <label for="ejemplo_email_3" class="col-sm-1 control-label">Pais</label>
    <div class="col-lg-2">
      <select class="form-control">
        <option value="Bolivia">Bolivia</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Chile">Chile</option>
      </select>
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-sm-1 control-label">Guion</label>
    <div class="col-lg-4">
      <input type="text" name="ama_usu" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Guion">
    </div>
    <label for="ejemplo_email_3" class="col-sm-2 control-label">Estudio</label>
    <div class="col-lg-4">
      <input type="text" name="ama_usu" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Estudio">
    </div>    
    </div>
    <div class="form-group">
    <label for="ejemplo_email_3" class="col-sm-1 control-label">Genero</label>
    <div class="col-lg-4">
      <input type="text" name="ama_usu" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Genero">
    </div>
    <label for="ejemplo_email_3" class="col-sm-2 control-label">Resolucion</label>
    <div class="col-lg-4">
       <select class="form-control">
        <option value="1024 x 768">1024 x 768</option>
       
        <option value="1366 x 768">1366 x 768</option>
      </select>
    </div>    
    </div>
    </fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Datos Adicionales</legend>
    <div class="form-group">
    <label  class="col-lg-2 control-label">Portada</label>
    <div class="col-lg-5">
      <input type="file" value="<?=old("tel_usu")?>" class="form-control" id="files" name="files[]" id="ejemplo_email_3"
             placeholder="Portada">
             <br/>
    <output id="list"></output></div>
    </div>
     <div class="form-group">
    <label  class="col-lg-2 control-label">Tags</label>
    <div class="col-lg-5">
      <input type="text" value="<?=old("tel_usu")?>" name="tel_usu" class="form-control" id="ejemplo_email_3"
             placeholder="Introduzca de la siguiente forma Ej. Mies, Predica">

    </div>
    </div>
     <div class="form-group">
    <label  class="col-lg-2 control-label">Comentarios</label>
    <div class="col-lg-5">
    <textarea type="text" name="dir_usu" value="<?=old("dir_usu")?>" class="form-control" id="ejemplo_email_3"
             placeholder=""></textarea>

    </div>
    </div>
</fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Datos de venta</legend>
<div class="form-group">
    <label for="ejemplo_email_3" class="col-sm-2 control-label">Nombre comercial</label>
    <div class="col-lg-4">
      <input type="text" name="ama_usu" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Guion">
    </div>
    <label for="ejemplo_email_3" class="col-sm-2 control-label">Precio unitario</label>
    <div class="col-lg-4">
      <input type="text" name="ama_usu" class="form-control" value="<?=old("ama_usu")?>" id="ejemplo_email_3"
             placeholder="Estudio">
    </div>    
    </div>
</fieldset>
     <div class = "modal-footer">
            <button type = "submit" class = "btn btn-primary" data-dismiss = "modal"><span class="glyphicon glyphicon-check"></span>
              Registrar 
            </button>
            
            <button type = "button" class = "btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
               Limpiar 
            </button>
         </div>
    </form>
</div>

  <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
@stop