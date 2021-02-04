<?php 

	class usuarios{
		function registrar($datos){
			$con = conexion('root', '');
			$consulta = $con->prepare('insert into usuarios(cod_usua, nombre, usuario, pass, role)
				values (null, :nombre, :usuario, :pass, :role)');
			$consulta->execute(array(
				':nombre' => $datos[0],
				':usuario' => $datos[1],
				':pass' => $datos[2],
				':role' => 'usuario',
			));
		}

		function verificar($usuario){
			$con = conexion('root','');
			$consulta = $con->prepare('select * from usuarios where usuario = :usuario');
			$consulta->execute(array(':usuario' => $usuario));
			$resultado = $consulta->fetchAll();
			return $resultado;
		}

		function mostrarUsuarios(){
			$con = conexion('root', '');
			$consulta = $con->prepare("select usuario from usuarios where role = 'usuario' "); 
			$consulta->execute();
			return $consulta->fetchAll();
		}
	}




?>