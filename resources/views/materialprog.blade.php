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
  <form method="POST" class="form-horizontal" action="registrarmaterial" accept-charset="UTF-8" enctype="multipart/form-data">
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Seccion 1</legend>

 <div class="form-group">
    <label  class="col-sm-1 control-label">Codigo</label>
    <div class="col-md-2">
      <input type="text" name="cod_mat" class="form-control" id="cod_mat"
             placeholder="Codigo ">
    </div>
    <label  class="col-sm-1 control-label">Titulo</label>
    <div class="col-md-8">
      <input type="text" name="tit_mat"  class="form-control" id="tit_mat"
             placeholder="Titulo del material">
    </div>
  </div>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-4 control-label">Subtitulo</label>
    <div class="col-md-8">
      <input type="text" name="sub_mat"  class="form-control" id="sub_mat" 
             placeholder="Subtitulo del material">
    </div>
    </div>
</fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Seccion 2</legend>
   	 <div class="form-group">
    <label class="col-sm-1 control-label">Duracion</label>
    <div class="col-sm-2">
      <input type="time" name="dur_mat" step="1" class="form-control">
    </div>
     <label  class="col-sm-7 control-label">Cantidad de veces que se emite el video</label>
    <div class="col-sm-2">
      <input type="number" min="0" name="nro_pro"  class="form-control" id="nro_pro"
             placeholder="Nro">
    </div>
  </div>
</fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Seccion 3</legend>
   <div class="form-group">
    <label class="col-sm-2 control-label">Procedencia</label>
    <div class="col-md-4">
        <select class="form-control" required="yes" name="id_pro">
          <option>SELECCIONE</option>
          <?php foreach ($procedencias as $procedencia){
          ?>
          <option value="{{$procedencia->id}}">{{$procedencia->titulo}}</option>
          <?php } ?>
        </select>
      </div>
    <label for="ejemplo_password_3" class="col-sm-2 control-label">Tipo de archivo</label>
    <div class="col-md-4">
    <select class="form-control" name="id_arc">
      <option>SELECCIONE</option>
          <?php foreach ($archivos as $archivo){
          ?>
          <option value="{{$archivo->id}}">{{$archivo->titulo}}</option>
          <?php } ?>
          </select>
    </div>
    </div>
    <div class="form-group">
    <label for="ejemplo_password_3" class="col-sm-2 control-label">Ubicacion</label>
    <div class="col-md-4">
      <select name="id_ubi" class="form-control" id="id_ubi">
        <option>SELECCIONE</option>
        <option value="1">Estante</option>
        <option value="2">Cpu</option>
      </select>
    </div>
    <label for="ejemplo_password_3" class="col-sm-2 control-label">Ubicacion Fisica</label>
    <div class="col-md-4">
      <input type="text" name="des_ubi"  class="form-control" id="des_ubi" 
             placeholder="Ubicacion Fisica">
    </div>
    </div>
    </fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Datos produccion</legend>
    <div class="form-group">
    <label  class="col-sm-1 control-label">Director</label>
    <div class="col-lg-4">
      <input type="text" name="dir_mat" class="form-control"  id="dir_mat"
             placeholder="Director">
    </div>
    <label  class="col-sm-2 control-label">Año de produccion</label>
    <div class="col-md-2">
      <input type="number" name="anp_mat" min="1900" class="form-control" id="anp_mat"
             placeholder="Año">
    </div>
    <label  class="col-sm-1 control-label">Pais</label>
    <div class="col-lg-2">
      <select class="form-control" name="pai_mat">
        <option value="Bolivia">Bolivia</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Chile">Chile</option>
      </select>
    </div>
    </div>
    <div class="form-group">
    <label  class="col-sm-1 control-label">Guion</label>
    <div class="col-lg-4">
      <input type="text" name="gui_mat" class="form-control"  id="gui_mat"
             placeholder="Guion">
    </div>
    <label  class="col-sm-2 control-label">Estudio</label>
    <div class="col-lg-4">
      <input type="text" name="est_mat" class="form-control"  id="est_mat"
             placeholder="Estudio">
    </div>    
    </div>
    <div class="form-group">
    <label  class="col-sm-1 control-label">Genero</label>
    <div class="col-lg-4">
      <select class="form-control" required="yes" name="gen_mat">
          <option>SELECCIONE</option>
          <?php foreach ($generos as $genero){
          ?>
          <option value="{{$genero->id}}">{{$genero->titulo}}</option>
          <?php } ?>
        </select>
    </div>
    <label  class="col-sm-2 control-label">Resolucion</label>
    <div class="col-lg-4">
       <select class="form-control" name="res_mat">
        <option value="1">1024 x 768</option> 
        <option value="2">1366 x 768</option>
      </select>
    </div>    
    </div>
    </fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;"> Datos Adicionales</legend>
    <div class="form-group">
    <label  class="col-lg-2 control-label">Portada</label>
    <div class="col-lg-5">
      <input type="file" class="form-control" id="files" name="files" 
             placeholder="Portada">
             <br/>
    <output id="list"></output></div>
    </div>
     <div class="form-group">
    <label  class="col-lg-2 control-label">Tags</label>
    <div class="col-lg-5">
      <input type="text" value="<?=old("tel_usu");?>" name="tel_usu" class="form-control" id="ejemplo_email_3"
             placeholder="Introduzca de la siguiente forma Ej. #Mies#Predica">

    </div>
    </div>
    <div class="form-group">
    <label  class="col-lg-2 control-label">Comentarios</label>
    <div class="col-lg-5">
    <textarea type="text" name="com_mat" class="form-control" id="com_mat"
             placeholder=""></textarea>

    </div>
    </div>
</fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Datos de venta</legend>
<div class="form-group">
    <label  class="col-sm-2 control-label">Nombre comercial</label>
    <div class="col-lg-9">
      <input type="text" name="nom_art" class="form-control"  id="nom_art"
             placeholder="Nombre comercial del material">
    </div>
</div>
<div class="form-group">
    <label  class="col-sm-2 control-label">Categoria :</label>
    <div class="col-lg-4">
      <select class="form-control" id="id_cat" name="id_cat" >
       
        <?php foreach ($categorias as $categoria){
          ?>
          <option value="{{$categoria->id}}">{{$categoria->NOM_CAT}}</option>
          <?php } ?>
      </select>
    </div>
    <label  class="col-sm-2 control-label">Precio unitario</label>
    <div class="col-lg-4">
      <input type="number" step="0.01" name="pre_art" class="form-control"  id="pre_art"
             placeholder="Bs.">
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
</div>
    </form>

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