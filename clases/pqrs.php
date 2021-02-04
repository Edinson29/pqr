<?php 

	class pqrs{
		function crearPqr($datos, $fecha_limite, $fecha_creacion, $resultados){
			$con = conexion('root', '');
			$consulta = $con -> prepare('insert into pqr(cod_pqr, tipo_pqr, asunto_pqr, usuario, estado, fecha_creacion, fecha_limite, cod_usua)
				values (null, :tipo_pqr, :asunto_pqr, :usuario, :estado, :fecha_creacion, :fecha_limite, :cod_usua)');
			$consulta->execute(array(
				':tipo_pqr' => $datos[0],
				':asunto_pqr' => $datos[1],
				':usuario' => $datos[2],
				':estado' => 'Nuevo',
				':fecha_creacion' => $fecha_creacion,
				':fecha_limite' => $fecha_limite,
				':cod_usua' => $resultados[0]['cod_usua']
			));
		}

		function mostrarPqrAdmin(){
			$con = conexion('root', '');
			$consulta = $con->prepare("select cod_pqr, tipo_pqr, asunto_pqr, usuario, estado, fecha_creacion, fecha_limite
			from pqr"); 
			$consulta->execute();
			return $consulta->fetchAll();
		}

		function mostrarPqrUsuario($usuario){
			$con = conexion('root', '');
			$consulta = $con->prepare("select cod_pqr, tipo_pqr, asunto_pqr, usuario, estado, fecha_creacion, fecha_limite
			from pqr where usuario = :usuario"); 
			$consulta->execute(array(
				':usuario' => $usuario
			));
			return $consulta->fetchAll();
		}

		function editarPqr($cod_pqr){
			$con = conexion('root','');
			$consulta = $con -> prepare("Select * from pqr where cod_pqr = $cod_pqr");
			$consulta -> execute();
			return $consulta -> fetch();
		}

		function actualizarPqr($datos){
			$con = conexion('root', '');
			$consulta = $con -> prepare("update pqr set asunto_pqr = :asunto_pqr,
				usuario = :usuario, estado = :estado where cod_pqr = :cod_pqr");
			$consulta -> execute(array(
				':cod_pqr' => $datos['cod_pqr'],
				':asunto_pqr' => $datos['asunto_pqr'],
				':usuario' => $datos['usuario'],
				':estado' => $datos['estado']
			));
		}

		function actualizarPqrTipoPqr($datos){
			$con = conexion('root', '');
			$consulta = $con -> prepare("update pqr set tipo_pqr = :tipo_pqr, asunto_pqr = :asunto_pqr,
				usuario = :usuario, estado = :estado, fecha_limite = :fecha_limite where cod_pqr = :cod_pqr");
			$consulta -> execute(array(
				':cod_pqr' => $datos['cod_pqr'],
				':tipo_pqr' => $datos['tipo_pqr'],
				':asunto_pqr' => $datos['asunto_pqr'],
				':usuario' => $datos['usuario'],
				':estado' => $datos['estado'],
				':fecha_limite' => $datos['fecha_limite']
			));
		}

		function eliminarPqr($cod_pqr){
			$con = conexion('root', '');
			$consulta = $con -> prepare("delete from pqr where cod_pqr = $cod_pqr");
			$consulta -> execute();
		}

		function tipoPqr($cod_pqr){
			$con = conexion('root', '');
			$consulta = $con -> prepare("select tipo_pqr from pqr where cod_pqr = $cod_pqr");
			$consulta -> execute();
			return $consulta -> fetch();
		}
	}


?>