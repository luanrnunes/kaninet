<?php

	session_start();

	if(!isset($_SESSION['usuario'])){

	header('location: index.php?erro=1');
		}
	
	require_once('dbclass.php');

	$id_usuario = $_SESSION['id_usuario'];
	$seguir_id_usuario = $_POST['seguir_id_usuario'];

	if($id_usuario != '' && $seguir_id_usuario != ''){

		$objDb = new db();
    	$link = $objDb->conecta_banco();

    	$sql = " INSERT INTO usuarios_seguidores(id_usuario, seguindo_id_usuario)values($id_usuario, $seguir_id_usuario) ";
 	
		mysqli_query($link, $sql);	

	}

	

	?>