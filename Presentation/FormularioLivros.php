<html>
	<head>
		<title>Cadastro de Livros</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="Biblio-tec.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/cssBranco.css">
		<link rel="stylesheet" type="text/css" href="css/css_cadastro.css">
		<script type="text/javascript" src="js/FormularioLivros.js"></script>
	</head>


	<body>
		<div id="container">
			<?php

			
			$var = "";
			
			include_once("includes/cabecalho.php");
			include ("includes/validaUsuario.php");
			include_once("includes/menuUsuario.php");

			?>

			<div id="corpo">  <br> <br>
		 

			
			<?php 
				$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";


						if($_SESSION["tipo"] == "0" && $username != $_SESSION["username"]){
							header("Location: Usuario.php");
						}

						if ($acao == "deletar") {
							include_once("includes/cadastroLivro/deletar.php");


						} else if ($acao == "alterar") {
							include_once("includes/cadastroLivro/alterar.php");


						} else {
							include_once("includes/cadastroLivro/inserir.php");
						}
						
						?>
			
			</div>
		</div> 	
			<?php
				include_once("includes/rodape.php");
			?>

	</body>

</html>
