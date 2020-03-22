<?php

	session_start();

	if(!isset($_SESSION['usuario'])){

	header('location: index.php?erro=1');
		}
	
	require_once('dbclass.php');

	$texto_postagem = $_POST['texto_postagem'];
	$id_usuario = $_SESSION['id_usuario'];

	if($texto_postagem != '' && $id_usuario != ''){

		$objDb = new db();
    	$link = $objDb->conecta_banco();

    	$sql = " INSERT INTO postagem(id_usuario, postagem)values($id_usuario, '$texto_postagem') ";
 	
		mysqli_query($link, $sql);	

	}

	

	?>

