<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listagem de Livros</title>
	<link rel="shortcut icon" href="Biblio-tec.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/cssListLivro.css">
	<link rel="stylesheet" type="text/css" href="css/cssTableLivro.css">
	<script type="text/javascript" src="js/FormularioLivros.js"> </script>
</head>
<body>
	<div id="container">
			<?php
			$var = "";

			
			include "includes/cabecalho.php";
			include ("includes/validaUsuario.php");
			include "includes/menuListagem.php"; ?>
			
			<div id="corpo">


			<br> <br>
			<form >
				<label>Titulo: </label>
				<input type="text" name="titulo" id="filtro">
				<input type="button" value="Buscar" onclick="filtrar()">
			</form>

			<div id="tabela">
			<?php
			include "filtrarLivro.php";
			?>

			</div>

			<?php
			include "includes/rodape.php";
			?>
	</div>
</body>
</html>