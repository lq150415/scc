<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido al Sistema de ventas del SCC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/form.css">
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body class="background">
<div class="jumbotron form_login">
	<form action="login" method="POST" role="form">
		<legend>Bienvenido al Sistema de ventas - SCC</legend>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group contenido">
			<label class="labelform" for="">Nombre de usuario</label>
			<input type="text" class="form-control txtsmall" id="" name="nic_usu" required="required" placeholder="Ingrese su nombre de usuario">
			</br>
			</br>

			<label class="labelform" for="">Password</label>
			<input type="password" class="form-control txtsmall" id="" name="password" placeholder="Ingrese su contraseña">
		</div>
		
	
		
	
		<button type="submit" class="btn btn-success btnin"><span class="glyphicon glyphicon-log-in"></span> Ingresar</button>
		<button type="submit" class="btn btn-info btnclc"><span class="glyphicon glyphicon-trash"></span> Limpiar</button>
	</form>
</div>
</body>
</html>