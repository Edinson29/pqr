<?php 
	require('funciones.php');
	require('clases/usuarios.php');
	$error = '';
	if(isset($_POST['registrar'])){
		$pass = hash('sha512', utf8_encode($_POST['pass']));
		$datos = array(
			$_POST['nombre'],
			$_POST['usuario'],
			$pass,
		);

		if(datos_vacios($datos) == false){
			$datos = limpiar($datos);
			if(strpos($datos[1], ' ') == false){
				if(empty(usuarios::verificar($datos[1]))){
					usuarios::registrar($datos);
					echo "<script> 
						alert('Registrado Exitosamente')
						window.location.href = ('login.php')
					</script>";
					// header('location: login.php');
				}else{
					$error .= 'El usuario ya existe';
				}
			}else{
				$error .= 'El usuario no debe tener espacios';
			}
		}else{
			$error .= 'Hay campos vacios';
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>registro</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="contenedor-form">
		<h1>Registrate</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<input type="text" name="nombre" placeholder="Nombre" class="input-control">
			<input type="text" name="usuario" placeholder="Usuario" class="input-control">
			<input type="password" name="pass" placeholder="Contraseña" class="input-control">
			<input type="submit" value="Registrar" name="registrar" class="log-btn">
			<?php if(!empty($error)): ?>
				<p class="error"><?php echo $error; ?></p>
			<?php endif; ?>
			<div class="registrar">
				<a href="login.php">¿Tienes una cuenta?</a>
			</div>
		</form>
	</div>
</body>
</html>