<?php
	require('funciones.php');
	require('clases/pqrs.php');
	require('clases/usuarios.php');
	session_start();
	verificar_session();
	$cod_pqr = $_GET['id'];
	$pqr = pqrs::editarPqr($cod_pqr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar PQR</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	
	<div class="contenedor-form">
		<h1>Editar PQR</h1>
		<form action="<?php echo 'actualizar.php' ?>" method="POST">
			<input type="hidden" name='cod_pqr' value="<?php echo $pqr['cod_pqr'] ?>">
			<input type="hidden" name='fecha_creacion' value="<?php echo $pqr['fecha_creacion'] ?>">
			<input type="hidden" name='fecha_limite' value="<?php echo $pqr['fecha_limite'] ?>">
			<select name="tipo_pqr" id="">
				<option value="<?php echo $pqr['tipo_pqr'] ?>"> <?php echo ucfirst($pqr['tipo_pqr']) ?></option>
				<?php  
					$pequere = array('peticion', 'queja', 'reclamo');
					foreach ($pequere as $p) {
						if($pqr['tipo_pqr'] != $p){
							echo "<option value= $p>". ucfirst($p)." </option>";
						}
					}
				?>
			</select>
			<textarea type="textaera" name="asunto_pqr" class="input-control" ><?php echo $pqr['asunto_pqr'] ?></textarea>
			<select name="usuario" id="">
				<option value="<?php echo $pqr['usuario'] ?>"><?php echo $pqr['usuario'] ?></option>
				<?php 
					$resultado = usuarios::mostrarUsuarios();
					foreach($resultado as $res){
						if($pqr['usuario'] != $res['usuario']){
							echo "<option value=".$res['usuario'].">".$res['usuario']."</option>";
						}
					}
				?>					
			</select>
			<select name="estado" id="">
				<option value="<?php echo $pqr['estado'] ?>"><?php echo $pqr['estado'] ?></option>
				<?php 
					$estado = array('Nuevo', 'En ejecucion', 'Cerrado');
					for($i = 0; $i <= 2; $i++){
						if($pqr['estado'] == $estado[$i]){
							echo "<option value='".$estado[$i + 1]."'>".$estado[$i + 1]."</option>";
						}
					}
				?>
			</select>
			<input type="submit" value="Actualizar" name="actualizar" class="log-btn">
		</form>
</body>
</html>