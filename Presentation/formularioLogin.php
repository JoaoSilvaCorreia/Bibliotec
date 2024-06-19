<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="Biblio-tec.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/cssBranco.css">
		<link rel="stylesheet" type="text/css" href="css/css_cadastro.css">
		
		<script type="text/javascript" src="js/FormularioUsuarios.js"></script>
	</head>
	<body>
		<div id="container">
			<?php
			$var = "";

			
			include_once("includes/cabecalho.php");
			include_once("includes/menuUsuario.php");
			
			 ?>
			
			<div id="corpo">
			<form action="cadastrarUsuario.php" method="POST" > <br> <br>
					
						
						<?php
						
						#include_once("includes/validaUsuario.php");
						include_once("../Entities/login.php"); 
						include_once("../DAO/usuarioDAO.php");
						
						$username = isset($_GET["username"]) ? $_GET["username"] : "";
						$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";



						if ($acao == "deletar") {
							include_once("includes/cadastroUsuario/deletar.php");


						} else if ($acao == "alterar") {

						if($_SESSION["tipo"] == "0" && $username != $_SESSION["username"]){
							header("Location: listagemLogin.php");
							}
						
							include_once("includes/cadastroUsuario/alterar.php");


						} else {
							include_once("includes/cadastroUsuario/inserir.php");
						}
						
						?>
						
					</div>
					
				</form>
			</div>

			<?php
			include "includes/rodape.php";
			?>
			
		</div>
		<script type="text/javascript">
			function cancela(){
				window.location.href = "listagemLogin.php";
			}
		</script>
	</body>
</html>