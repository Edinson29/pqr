<?php 

	require('funciones.php');
	require('clases/pqrs.php');

	$cod_pqr = $_GET['id'];
	pqrs::eliminarPqr($cod_pqr);
	header('location: index.php');
?>