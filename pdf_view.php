<?php 
	require('funciones.php');
	require('clases/pqrs.php');
	$resultado = pqrs::mostrarPqrAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pqr Pdf</title>
</head>
<style>
	table{
	border-collapse: collapse;
	margin-top: 10px;
	}
	th{
		background-color: #7952b3;
		color: white;
		padding: 10px;
	}
	td{
		border: 1px solid black;
		border-spacing: 0;
		padding: 5px;
	}
</style>
<body>
	<table class="table">
		<thead>
		<tr>
		  <th>#</th>
		  <th>Tipo de PQR</th>
		  <th>Asunto PQR</th>
		  <th>Usuario</th>
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
</body>
</html>