@extends ('layout')
@section('title')
	Registro de publicidad - Sistema cristiano de comunicaciones
@endsection
@section('css')
			<style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
      </style>
@endsection
	@section ('cuerpo')
	<div class="panel panel-info cuerpo">
  <div class="panel-heading titleform" >REGISTRO DE PUBLICIDAD XTO-TV - SCC </div>
  <div class="panel-body bodyform">
<!-- Button trigger modal -->
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; width:auto; margin-bottom:0px; padding:4px;" > Datos tecnicos</legend>
<div>
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
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Datos generales</legend>

 <div class="form-group">
    <label  class="col-sm-1 control-label">Codigo</label>
    <div class="col-md-2">
      <input type="text" name="cod_mat" class="form-control" id="cod_mat"
             placeholder="Codigo ">
    </div>
    <label  class="col-sm-1 control-label">Titulo</label>
    <div class="col-md-8">
      <input type="text" name="tit_mat"  class="form-control" id="tit_mat"
             placeholder="Titulo de la publicidad">
    </div>
  </div>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-4 control-label">Descripcion</label>
    <div class="col-md-8">
      <input type="text" name="sub_mat"  class="form-control" id="sub_mat"
             placeholder="Descripcion de la publicidad">
    </div>
    </div>
</fieldset>
<fieldset  style="border:1px #ddd solid; padding:10px;">
<legend style="border:none; font-size:13px; width:auto; margin-bottom:0px; padding:4px;" > Datos adicionales</legend>
   	 <div class="form-group">
    <label class="col-sm-1 control-label">Duracion</label>
    <div class="col-sm-2">
      <input type="time" name="dur_mat" step="1" class="form-control">
    </div>
     <label  class="col-sm-3 control-label">Tiempo de vida</label>
    <div class="col-sm-2">
      <select class="form-control" name="">
        <option value="1">1 mes</option>
        <option value="2">2 meses</option>
        <option value="3">3 meses</option>
        <option value="4">4 meses</option>
        <option value="5">5 meses</option>
        <option value="6">6 meses</option>
        <option value="7">7 meses</option>
        <option value="8">8 meses</option>
        <option value="9">9 meses</option>
        <option value="10">10 meses</option>
        <option value="11">11 meses</option>
        <option value="12">1 año</option>
      </select>
    </div>
  </div>
  <div class="form-group">
   <label for="ejemplo_password_3" class="col-lg-6 control-label">EMPRESA</label>
   <div class="col-md-6">
     <input type="text" name="sub_mat"  class="form-control" id="sub_mat"
            placeholder="Nombre de la empresa">
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
@stop
@section('script')
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
@endsection
