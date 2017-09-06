@extends ('layout2')
@section('title')
		Hoja de programacion - Sistema cristiano de comunicaciones
@endsection
	@section ('cuerpo')
  <div class="col-lg-7">
		<form class="form-group" class="" action="pdfhoja" method="post" target="_blank">
				<div class="form-group">
					<label class="col-lg-1">FECHA: </label>
					<div class="col-lg-10">
						<input type="date" class="form-control" name="fec_hoj" required>
					</div>
				</div>
  <table class="table table-hover" id="table">

      <thead>
          <tr>
							<td>Calcular</td>
              <td>Codigo</td>
              <td>Material</td>
              <td>Duracion</td>
              <td>Observaciones</td>
              <td>Acciones</td>
          </tr>
      </thead>
      <tbody></tbody>

    </table>
		<div class="form-group">
			<button type="submit" name="btnhoja" class="btn btn-success">Imprimir hoja de programación</button>
			<button type="submit" name="btnfin" class="btn btn-danger">Finalizar</button>
		</div>
	</form>

</div>
<div id="datosmaterial" class="col-lg-5">

</div>
    <script type="text/javascript" src="js/tutorial.js"></script>

    <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog"
       aria-labelledby = "myModalLabel" aria-hidden = "true">

       <div class = "modal-dialog">
          <div class = "modal-content">
             <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                      &times;
                </button>

                <h4 class = "modal-title" id = "myModalLabel">
                   Registro rapido de material de programacion
                </h4>
             </div>

             <div class = "modal-body form-horizontal">
                	<div class="form-group">
										<label class="col-lg-4">Codigo</label>
										<div class="col-lg-8">
												<input type="text" id="cod_mat2" class="form-control" required>
										</div>
                	</div>
									<div class="form-group">
										<label class="col-lg-4">Titulo del material</label>
										<div class="col-lg-8">
												<input type="text" id="tit_mat2" class="form-control" required>
										</div>
                	</div>
									<div class="form-group">
										<label class="col-lg-4">Duracion</label>
										<div class="col-lg-8">
												<input type="time" step="1" id="dur_mat2" class="form-control" required>
										</div>
                	</div>
								</div>
									<div class="modal-footer">
										<button type="button" onclick="javascript:registromaterial();" class="btn btn-success" data-dismiss="modal">Registrar</button>
									</div>
          </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
      </div>
    </div>
  @endsection
	@section('script')
		<script type="text/javascript">
		window.onload = function cargarmaterial()
		{
			 id = 1;
			$.post("cargarmaterial", { id: id }, function(data){
					$("#datosmaterial").html(data);
			});
		};
		function registromaterial()
		{

			cod_mat=$("#cod_mat2").val();
			tit_mat=$("#tit_mat2").val();
			dur_mat=$("#dur_mat2").val();
			console.log(cod_mat);
			$.post("cargarmaterial", { cod_mat: cod_mat, tit_mat:tit_mat, dur_mat:dur_mat }, function(data){
					$("#datosmaterial").html(data);
			});
			$("#body2").html('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Material registrado correctamente!</strong></div>').delay(3000).fadeOut();

		}
		</script>
	@endsection
