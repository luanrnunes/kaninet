<?php

session_start();

require_once('dbclass.php');

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT id, usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

    $objDb = new db();
 	$link = $objDb->conecta_banco(); 

	$resultado_id = mysqli_query($link, $sql); //Retorno do Select

	//Valida se execução da consulta foi bem-sucedida
	if($resultado_id){
     
     $dados_usuario = mysqli_fetch_array ($resultado_id); //Retorna dados externos em estrutura de array
     
      if(isset($dados_usuario['usuario'])){
 		
 		$_SESSION['id_usuario'] = $dados_usuario['id'];
 		$_SESSION['usuario'] = $dados_usuario['usuario'];
 		$_SESSION['email'] = $dados_usuario['email'];

         header('location: home.php');
        
        }
        else {

        	header('Location: index.php?erro=1');
        }

	}
	 else{

	 	echo 'Erro ao tentar realizar a consulta. Entre em contato com o departamento de TI';


	 }

	

	

?>