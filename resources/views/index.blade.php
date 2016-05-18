@extends ('layout')
	@section ('cuerpo')
	<div class="panel panel-success bienvenida">
			<p> Bienvenido/a <?php echo $idUsuario = Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU?> </p>
	</div>






	@stop