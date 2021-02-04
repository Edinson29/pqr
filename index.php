<?php 
	session_start();
	require('funciones.php');
	require('clases/pqrs.php');
	verificar_session();
	if(isset($_POST['logout'])){
		session_destroy();
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php if($_SESSION['role'] == 'administrador'): ?>
		<?php 
			$resultado = pqrs::mostrarPqrAdmin();
		?>
		<a href="crear.php" class="crear">Crear PQR</a>
		<a href="pqrexcel.php" class="excel">Exportar a excel</a>
		<a href="pqrpdf.php" class="pdf">Exportar a pdf</a>
		<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<button name="logout">Log Out</button>
		</form>
		<table class="table">
			<thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Tipo de PQR</th>
			  <th scope="col">Asunto PQR</th>
			  <th scope="col">Usuario</th>
			  <th>Estado</th>
			  <th>Fecha de creacion</th>
			  <th>Fecha Limite</th>
			  <th colspan="2">Opciones</th>
			</tr>
			</thead>
			<?php foreach($resultado as $res){
				echo "<tbody>";
					echo "<tr>";
						echo "<td>".$res['cod_pqr']."</td>";
						echo "<td>".$res['tipo_pqr']."</td>";
						echo "<td>".$res['asunto_pqr']."</td>";
						echo "<td>".$res['usuario']."</td>";
						echo "<td>".$res['estado']."</td>";
						echo "<td>".$res['fecha_creacion']."</td>"; 
						echo "<td>".$res['fecha_limite']."</td>";
						if($res['estado'] != 'Cerrado'){
							echo "<td><a href='editar.php?id=".$res['cod_pqr']."'>Editar</a></td>";
						}
						echo "<td><a href='eliminar.php?id=".$res['cod_pqr']."'>Eliminar</a></td>";
					echo "</tr>";
				echo "</tbody>";
			} ?>
		</table>
	<?php else: ?>
		<?php 
			$usuario = $_SESSION['usuario'];
			$resultado = pqrs::mostrarPqrUsuario($usuario);
		?>
		<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<button name="logout">Log Out</button>
		</form>
		<table class="table">
			<thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Tipo de PQR</th>
			  <th scope="col">Asunto PQR</th>
			  <th scope="col">Usuario</th>
			  <th>Estado</th>
			  <th>Fecha de creacion</th>
			  <th>Fecha Limite</th>
			</tr>
			</thead>
			<?php foreach($resultado as $res){
				echo "<tbody>";
					echo "<tr>";
						echo "<td>".$res['cod_pqr']."</td>";
						echo "<td>".$res['tipo_pqr']."</td>";
						echo "<td>".$res['asunto_pqr']."</td>";
						echo "<td>".$res['usuario']."</td>";
						echo "<td>".$res['estado']."</td>";
						echo "<td>".$res['fecha_creacion']."</td>"; 
						echo "<td>".$res['fecha_limite']."</td>";
					echo "</tr>";
				echo "</tbody>";
			} ?>
		</table>
	<?php endif; ?>
</body>
</html>