		<table>
				<thead>
					<tr>
						<th>Titulo</th> 
						<th>Autor</th>
						<th>Assunto</th>
						<th>Editora</th>
						<th>Edicao</th>
						<th>Páginas</th>
						<th>Ano</th>
						<th>Download</th>
						<th>Editar</th>
						<th>Remover</th>
					
					</tr>
				</thead>
				<tbody>
					<br> <br>
					<?php
					include_once("../BO/livroBO.php");
					include ("includes/validaUsuario.php");
					include_once("../Entities/formularioLivro.php");

					$bo = new livroBO();
					$filtro = isset($_GET["titulo"]) ? $_GET["titulo"] : "";

					$livros = $bo->selecionar($filtro);

					foreach ($livros as $livros) {
						echo "<tr>
						<td >$livros->titulo</td>
						<td>$livros->autor</td>
						<td>$livros->assunto</td>
						<td>$livros->editora</td>
						<td>$livros->edicao</td>
						<td>$livros->numPaginas</td>
						<td>$livros->ano</td>
						<td><a href='$livros->arquivo'>Download</a></td>
						<td><a href='FormularioLivros.php?id=$livros->id&acao=alterar'> Editar </a></td>
						<td><a href='javascript:remover($livros->id)'> Remover</a></td>
						</tr>";
					}
					
					?>
				</tbody>
		</table>