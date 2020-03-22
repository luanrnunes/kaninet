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
$sql = " SELECT  COUNT(*) AS qtde_postagens FROM postagem WHERE id_usuario = $id_usuario ";


$resultado_id = mysqli_query($link, $sql);

$qtde_postagens = 0;

if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtde_postagens = ($registro['qtde_postagens']);

} else {

	echo "Erro ao tentar conectar com o banco de dados! Entre em contato com o departamento de TI.";
}

$sql = " SELECT COUNT(*) AS qtde_tms FROM usuarios_seguidores WHERE id_usuario = $id_usuario ";


$resultado_id = mysqli_query($link, $sql);

$qtde_tms = 0;

if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtde_tms = $registro['qtde_tms'];

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

				$('#btn_procurar_pessoa').click(function(){

					if($('#nome_pessoa').val().length > 0){

						$.ajax({

							url: 'get_pessoas.php',

							method: 'POST',

							data: $('#form_procurar_pessoas').serialize(),

							success: function(data){

								$('#pessoas').html(data);

								$('.btn_seguir').click( function(){
									var id_usuario = $(this).data('id_usuario');

									$('#btn_seguir_'+id_usuario).hide();
									$('#btn_deixar_seguir_'+id_usuario).show();


									$.ajax({
										url: 'mate.php',
										method: 'post',
										data: { seguir_id_usuario: id_usuario },
										success: function(data){
											
										}
									});


								});

									$('.btn_deixar_seguir').click( function(){
										var id_usuario = $(this).data('id_usuario');

										$('#btn_seguir_'+id_usuario).show();
										$('#btn_deixar_seguir_'+id_usuario).hide();


									$.ajax({
										url: 'unmate.php',
										method: 'post',
										data: { deixar_seguir_id_usuario: id_usuario },
										success: function(data){
										
										}
									});


									});


							}

						});

					}

				});



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
						<li><a href="home.php">Home</a></li>
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
						<form id="form_procurar_pessoas" class="input-group">
							<input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control" placeholder="Digite o nome de seu colega" maxlength="500" />
							<span class="input-group-btn">
								<button class="btn btn-default" id="btn_procurar_pessoa" type="button">Procurar</button>
							</span>
						</form>
					</div>
				</div>
				<div id="pessoas" class="list-group"></div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						
						</div>
				</div>
			</div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</body>
</html>