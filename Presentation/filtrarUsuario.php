
				<table>
				<thead>
					<tr>
						<th>Username</th> 
						<th>Senha</th>
						<th>Editar</th>
						<th>Remover</th>
					</tr>
				</thead>
				<tbody>
				
					<?php
					include_once("../BO/usuarioBO.php");
					include ("includes/validaUsuario.php");
					include_once("../Entities/login.php");

					$bo = new usuarioBO();
					$filtro = isset($_GET["login"]) ? $_GET["login"] : "";

					
					if ($_SESSION["tipo"] == "0"){
						$filtro = $_SESSION["username"];
					}

					$usuarios = $bo->selecionar($filtro);

					foreach ($usuarios as $usuario) {
					echo "<tr>
								<td>$usuario->username</td>
								<td>$usuario->senha</td>
								<td>
									<a href='formularioLogin.php?username=$usuario->username&acao=alterar'>  Editar </a>

								</td>
							
								<td>
									<a href='javascript:remover(\"$usuario->username\");'> Remover</a>
								</td>
						</tr>";
					}
					
					?>
				</tbody>
			</table>
