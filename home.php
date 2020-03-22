<?php
	
	session_start();

	if(!isset($_SESSION['usuario'])){
    header('location: index.php?erro=1');

}

require_once('dbclass.php');

		$objDb = new db();
    	$link = $objDb->conecta_banco();

$id_usuario = $_SESSION['id_usuario'];

//consulta a quantidade de posts do usuário
$sql = " SELECT COUNT(*) AS qtde_postagens FROM postagem WHERE id_usuario = $id_usuario ";


$resultado_id = mysqli_query($link, $sql);

$qtde_postagens = 0;

if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtde_postagens = ($registro['qtde_postagens']);

} else {

	echo "Erro ao tentar conectar com o banco de dados! Entre em contato com o departamento de TI.";
}

//consulta a quantidade de TeamMates do usuário

$sql = " SELECT COUNT(*) AS qtde_tms FROM usuarios_seguidores WHERE id_usuario = $id_usuario ";


$resultado_id = mysqli_query($link, $sql);

$qtde_tms = 0;

if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtde_tms = ($registro['qtde_tms']);

} else {

	echo "Erro ao tentar conectar com o banco de dados! Entre em contato com o departamento de TI.";
}


?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>KaniNet</title>

		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">

			$(document).ready(function(){

				$('#btn_post').click(function(){

					if($('#texto_postagem').val().length > 0){

						$.ajax({

							url: 'inclui_post.php',

							method: 'POST',

							data: $('#form_post').serialize(),

							success: function(data){

								$('#texto_postagem').val('');
								
								atualizaPostagem();



							}

						});

					}

				});

				function atualizaPostagem(){



		


					$.ajax({

						url: 'get_postagem.php',

						success: function(data){

							$('#postagens').html(data);

							$('.btn_excluir').click( function(){
								var id_excluir = $(this).data('id_excluir');

								$.ajax ({
									url: 'exclui_post.php',
									method: 'post',
									data: { excluir: id_excluir},
									success: function(data){
										window.location.reload();
									}
								});
							});

						}

					});

				}

				atualizaPostagem();

			});

		</script>

	</head>

	<body>

		
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img src="imagens/kaninet.png" />
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="quit.php">Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>


		<div class="container">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><?= $_SESSION['usuario'] ?></h4>
						<hr />
						<div class="col-md-6">
							Postagens <br /> <?= $qtde_postagens ?>
						</div>
						<div class="col-md-6">
							TeamMates <br /> <?= $qtde_tms ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="form_post" class="input-group">
							<input type="text" id="texto_postagem" name="texto_postagem" class="form-control" placeholder="Publicar para minha organização" maxlength="500" />
							<span class="input-group-btn">
								<button class="btn btn-default" id="btn_post" type="button">Publicar</button>
							</span>
						</form>
					</div>
				</div>
				<div id="postagens" class="list-group"></div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><a href="procurar_pessoas.php">Procurar TMs!</a></h4>
					</div>
				</div>
			</div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</body>
</html>