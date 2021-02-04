<?php 
	
	require('funciones.php');
	require('clases/pqrs.php');
	if(isset($_POST['actualizar'])){
		$datos = array(
			'cod_pqr' => $_POST['cod_pqr'],
			'tipo_pqr' => $_POST['tipo_pqr'],
			'asunto_pqr' => $_POST['asunto_pqr'],
			'usuario' => $_POST['usuario'],
			'estado' => $_POST['estado'],
			'fecha_creacion' => $_POST['fecha_creacion'],
			'fecha_limite' => $_POST['fecha_limite']
		);
		if(datos_vacios($datos) == false){
			$cod_pqr = $datos['cod_pqr'];
			$tipo_pqr = $datos['tipo_pqr'];
			$tipoPqrBD = pqrs::tipoPqr($cod_pqr); /* Se guarda en una variable porque la funcion retorna un array con
													dos valores [tipo_pqr], [0]*/
			if($tipo_pqr == $tipoPqrBD['tipo_pqr']){
				pqrs::actualizarPqr($datos);
				header('location: index.php');
			}else{
				$fecha_creacion = $datos['fecha_creacion'];
				$fecha_limite = $datos['fecha_limite'];
				$datos['fecha_limite'] = fecha_limite($fecha_creacion, $fecha_limite, $tipo_pqr);
				pqrs::actualizarPqrTipoPqr($datos);
				header('location: index.php');
			}
		}
	}

?>