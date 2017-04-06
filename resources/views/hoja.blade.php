@extends ('layout')
	@section ('cuerpo')
  <div class="col-lg-10">
  <table class="table table-hover" id="table">
      <thead>
          <tr>
              <td>Codigo</td>
              <td>Material</td>
              <td>Duracion</td>
              <td>Mover</td>
              <td>Eliminar</td>
          </tr>
      </thead>
      <tbody></tbody>
      <tfoot>
          <tr>
              <td colspan="4">
                  <button data-toggle = "modal" data-target = "#myModal" class="btn btn-success"> Nuevo</button>
              </td>
          </tr>
      </tfoot>
    </table>
</div>
    <script type="text/javascript" src="js/libs/jquery-2.1.0.min.js">
    </script>
    <script type="text/javascript" src="js/tutorial.js"></script>

    <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog"
       aria-labelledby = "myModalLabel" aria-hidden = "true">

       <div class = "modal-dialog modal-lg">
          <div class = "modal-content">

             <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                      &times;
                </button>

                <h4 class = "modal-title" id = "myModalLabel">
                   Lista de material registrado
                </h4>
             </div>

             <div class = "modal-body">
                <form class="form-horizontal" method="POST" action="registrarclientes">
                	<table id="example" class="display" style="float:left;">
                  	<thead >
                  		<tr>
                  			<th>Codigo</th>
                  			<th>Material</th>
                        <th>Duracion</th>
                  			<th data-orderable="false"> </th>
                  		</tr>
                  	</thead>

                  	<tbody style="font-size:11px;">
                  		<tr class="table table-hover">
                  		<?php
                  					foreach ($materiales as $material):
                            ?>
                  						<th>{{$material->COD_MAT}}</th>
                  						<th>{{$material->TIT_MAT.' ---'.$material->SUB_MAT}}</th>
                              <th>{{$material->DUR_MAT}}</th>
                  						<th style=" width:85px; ">
                                <button type="button" class="btn btn-success" data-dismiss = "modal" aria-hidden = "true" name="agregar material" onclick="javascript:nuevo(<?php
                                echo "'".$material->id."','".$material->COD_MAT."','".$material->TIT_MAT."----".$material->SUB_MAT."','".$material->DUR_MAT."'";
                                ?>)">Nuevo</button>
                              </th>

                                </tr>
                  				<?php endforeach;
                          ?>

                  	</tbody>
                  </table>
                </form>
              </div>
             </div>

          </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->
      </div>
    </div>


  @stop
