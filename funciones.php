<?php 

	function conexion($usuario, $pass){
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=prueba_extreme', $usuario, $pass);
			return $conexion;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	function datos_vacios($datos){
		$vacio = false;
		foreach($datos as $d){
			if (empty($d)){
				$vacio = true;
				break;
			}
		}
		return $vacio;
	}
	function limpiar($datos){
		$length = count($datos);
		for($i = 0; $i < $length; $i++){
			if($i != 2){
				# La funcion htmlspecialchars() convierte los caracteres predefinidos menor que y mayor que en entidades html
				$datos[$i] = htmlspecialchars($datos[$i]);
				# Remueve espacios de ambos lados de un string
				$datos[$i] = trim($datos[$i]);
				# Remueve la barra invertida
				$datos[$i] = stripcslashes($datos[$i]);
			}
		}
		return $datos;
	}

	function verificar_session(){
		if(!isset($_SESSION['cod_usua'])){
			header('location: login.php');
		}
	}

	function fecha_limite($fecha_creacion, $fecha_limite, $tipo_pqr){
		switch ($tipo_pqr) {
			case 'peticion':
				$fecha_limite = strtotime( $fecha_creacion. '+ 7 days');
				$fecha_limite = date('Y-m-d',$fecha_limite);
				return $fecha_limite;
				break;
			case 'queja':
				$fecha_limite = strtotime( $fecha_creacion. '+ 3days');
				$fecha_limite = date('Y-m-d',$fecha_limite);
				return $fecha_limite;
				break;
			case 'reclamo':
				$fecha_limite = strtotime( $fecha_creacion. '+ 2days');
				$fecha_limite = date('Y-m-d',$fecha_limite);
				return $fecha_limite;
				break;
			default:
				break;
		}
	}
?>