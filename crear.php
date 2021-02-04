<?php
	require('funciones.php');
	require('clases/usuarios.php');
	require('clases/pqrs.php');
	session_start();
	verificar_session();
	if (isset($_POST['crear'])){
		$fecha_limite = '';
		$datos = array(
			$tipo_pqr = $_POST['tipo_pqr'],
			$asunto_pqr = $_POST['asunto_pqr'],
			$usuario = $_POST['usuario']);
		if(datos_vacios($datos) == false){
			$resultados = usuarios::verificar($datos[2]);
			if (empty($resultados) == false){
				$fecha_creacion = date('Y-m-d');
				$fecha_limite = fecha_limite($fecha_creacion, $fecha_limite, $tipo_pqr);
				pqrs::crearPqr($datos, $fecha_limite, $fecha_creacion, $resultados);
				header('location: index.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale<<=1.0">
	<title>Crear PQR</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<div class="contenedor-form">
		<h1>Crear PQR</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<select name="tipo_pqr" id="">
				<option value="">Seleccione el tipo de PQR</option>
				<option value="peticion">Peticion</option>
				<option value="queja">Queja</option>
				<option value="reclamo">Reclamo</option>
			</select>
			<textarea type="textaera" name="asunto_pqr" placeholder="Asunto del PQR" class="input-control"></textarea>
			<select name="usuario" id="">
				<option value="">Escoja el Usuario</option>
				<?php 
					$resultado = usuarios::mostrarUsuarios();
					foreach($resultado as $res){
						echo "<option>".$res['usuario']."</option>";
					}
				?>					
			</select>
			<input type="submit" value="Crear" name="crear" class="log-btn">
		</form>
	</div>
</body>
</html>