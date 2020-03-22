<?php

	session_start();

	if(!isset($_SESSION['usuario'])){

	header('location: index.php?erro=1');
		}
	
	require_once('dbclass.php');

	$id_usuario = $_SESSION['id_usuario'];
	$excluir = $_POST['excluir'];

	if($id_usuario == '' || $excluir == ''){

		die();
	}

		$objDb = new db();
    	$link = $objDb->conecta_banco();

    	$sql = " DELETE FROM postagem WHERE id_usuario = $id_usuario AND id_postagem = $excluir" ;
 	
		mysqli_query($link, $sql);	


	

	?>