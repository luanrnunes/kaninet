<?php
	
	session_start();

	if(!isset($_SESSION['usuario'])){
    header('location: index.php?erro=1');
}

require_once('dbclass.php');

$id_usuario = $_SESSION['id_usuario'];

		$objDb = new db();
    	$link = $objDb->conecta_banco();

    	$sql = " SELECT DATE_FORMAT(p.data_postagem, '%d %b %Y %T') AS data_postagem_formatada, p.postagem, u.usuario, id_postagem, id_usuario FROM postagem AS p JOIN usuarios AS u ON (p.id_usuario = u.id) "; 
    	$sql.="WHERE id_usuario = $id_usuario OR id_usuario IN (select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario) ORDER BY data_postagem DESC ";
	
		$resultado_id = mysqli_query($link, $sql);	



		if($resultado_id){

			while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

						$idPostagem = $registro['id_postagem'];
						$idUsuario = $registro['id_usuario'];

				echo '<a href="#" class="list-group-item">';
					echo '<h4 class="list-group-item-heading">'.$registro['usuario'].' <small> - '.$registro['data_postagem_formatada'].'</small> </h4>';
				echo '<p class="list-group-item-text">'.$registro['postagem'].'</p>'; 
				if($id_usuario == $idUsuario){
					echo '<button type"button"  id="excluir_'.$registro['id_postagem'].'" class="btn btn-danger btn_excluir" data-id_excluir="'. $idPostagem .'">Excluir</button>';
				}
				echo '</p>';
				echo '<div class="clearfix"></div';
				echo '</a>';

			}


		} else {

			echo 'Erro ao tentar consultar a base de dados. Entre em contato com o departamento de TI!';

		}

?>