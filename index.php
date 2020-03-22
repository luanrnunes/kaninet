<?php

$erro = isset($_GET['erro']) ? $_GET['erro']: 2019;
echo $erro;

?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>KaniNET</title>

		<!-- jquery link -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap link -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel = "shortcut icon" type = "imagem/x-icon" href = "imagens/kaninet.png"/>

	
		<script> //javascript
			$(document).ready( function(){
				
				//Validar se os campos foram preenchidos
				$('#btn_login').click (function(){

					var campo_vazio = false;

				if($('#campo_usuario').val() == ''){
					
					$('#campo_usuario').css({'border-color': '#A94442'});
					
					campo_vazio = true; //Para o formulario não ser enviado antes das validações

				}
				else{

					$('#campo_usuario').css({'border-color': 'CCC'});
				}

				if ($('#campo_senha').val() == ''){

					$('#campo_senha').css({'border-color': '#A94442'});
					campo_vazio = true; //Para o formulario não ser enviado antes das validações
				}
				else{ $('#campo_senha').css({'border-color': 'CCC'});
			}

				if(campo_vazio) return false;

			});

			});						
		</script>
	</head>

	<body>

		<!-- Navegação -->
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
	            <li><a href="inscrevase.php">Cadastrar usuário</a></li>
	            <li class="<?= $erro == 1 ? 'open' : '' ?>"> <!--Volta com janela de login aberta após tentativa mal-sucedida de login -->
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Colaborador<br /> Acesse sua KaniNet!</h3>
				    		<br />
							<form method="post" action="valida_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
								
							</form>

							<?php
							 if ($erro == 1){
							 	echo '<font color="#FF0000">Usuário ou senha inválidos</font>';
							 };

							 ?>
					</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <div class="jumbotron">
	        <h1>Acesse sua KaniNet!</h1>
	        <p>Se tiver dificuldades para acesso, contate o departamento de TI ;) </p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>