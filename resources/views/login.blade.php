<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="{{url('validar')}}" method="POST">

		<label>USUARIO</label>
		<input type="text" name="usuario" placeholder="Escribe un usuario"> <br>
        {{csrf_field()}}

        <label>CONTRASEÑA</label>
		<input type="password" name="password">
		

        <button type="submit">INGRESAR</button>

	</form> 
</body>
</html>