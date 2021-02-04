<?php 
	session_start();
	require('funciones.php');
	require('clases/usuarios.php');

	$error = '';
	if (isset($_POST['login'])){
		$pass = hash('sha512', utf8_encode($_POST['pass']));
		$datos = array(limpiar($_POST['usuario']), $pass);
		if(datos_vacios($datos) == false){
			if(strpos($datos[0], ' ') == false){
				$resultado = usuarios::verificar($datos[0]);
				if (empty($resultado) == false){
					if ($datos[1] == $resultado[0]['pass']){
						$_SESSION['cod_usua'] = $resultado[0]['cod_usua'];
						$_SESSION['nombre'] = $resultado[0]['nombre'];
						$_SESSION['usuario'] = $resultado[0]['usuario'];
						$_SESSION['role'] = $resultado[0]['role'];
						header('location: index.php');
					}
				}else{
					$error .= 'El usuario no existe debe registrarse';
				}
			}else{
				$error .= 'El usuario no debe llevar espacios';
			}
		}else{
			$error .= 'Llene los dos campos';
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="contenedor-form">
		<h1>Log In</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<input type="text" name="usuario" placeholder="Usuario" class="input-control">
			<input type="password" name="pass" placeholder="Contraseña" class="input-control">
			<input type="submit" value="Log In" name="login" class="log-btn">
			<?php if(!empty($error)): ?>
				<p class="error"><?php echo $error; ?></p>
			<?php endif; ?>
			<div class="registrar">
				<a href="registro.php">¿No te has registrado?</a>
			</div>
		</form>
	</div>
</body>
</html>