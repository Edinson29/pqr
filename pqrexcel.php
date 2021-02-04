<?php
	require('funciones.php');
	require('clases/pqrs.php');
	$resultado = pqrs::mostrarPqrAdmin();
	header("Content-type: application/x-msdownload");
    header("Content-Disposition: attachment; filename=pqr.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PQR Excel</title>
</head>
<style>
</style>
<body>
	<table class="table">
		<thead>
		<tr>
		  <th style="background-color: #39e460">#</th>
		  <th style="background-color: #39e460">Tipo de PQR</th>
		  <th style="background-color: #39e460">Asunto PQR</th>
		  <th style="background-color: #39e460">Usuario</th>
		  <th style="background-color: #39e460">Estado</th>
		  <th style="background-color: #39e460">Fecha de creacion</th>
		  <th style="background-color: #39e460">Fecha Limite</th>
		</tr>
		</thead>
		<?php foreach($resultado as $res){
			echo "<tbody>";
				echo "<tr>";
					echo "<td style='border: 0.5pt solid #000'>".$res['cod_pqr']."</td>";
					echo "<td style='border: 0.5pt solid #000'>".$res['tipo_pqr']."</td>";
					echo "<td style='border: 0.5pt solid #000'>".$res['asunto_pqr']."</td>";
					echo "<td style='border: 0.5pt solid #000'>".$res['usuario']."</td>";
					echo "<td style='border: 0.5pt solid #000'>".$res['estado']."</td>";
					echo "<td style='border: 0.5pt solid #000'>".$res['fecha_creacion']."</td>"; 
					echo "<td style='border: 0.5pt solid #000'>".$res['fecha_limite']."</td>";
				echo "</tr>";
			echo "</tbody>";
		} ?>
	</table>
</body>
</html>	