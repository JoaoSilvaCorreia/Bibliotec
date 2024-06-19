<?php
include_once("basicDAO.php");
include_once("../Entities/usuario.php");
class usuarioDAO extends basicDAO{
	public function autenticar(usuario $user){

		$sql = "SELECT USERNAME, SENHA, ISADMIN, NOME FROM USUARIO where USERNAME = '$user->username' AND SENHA = '$user->senha'";


		$res = $this->mysql->query($sql);


		if ($res->num_rows > 0) {
    		// output data of each row
			while($row = $res->fetch_assoc()) {
				$retorno->username = $row["USERNAME"];
				$retorno->senha = $row["SENHA"];
				$retorno->tipo = $row["ISADMIN"];
				$retorno->nome = $row["NOME"];
			}
		} 

		return $retorno;
	}

	public function existeUsername($username){
		$sql = "SELECT USERNAME FROM USUARIO WHERE username='$username'";

		$res = $this->mysql->query($sql);

		if ($res->num_rows > 0) {
			return true;
		}
		else
			return false;
	}

	public function inserir(usuario $usuario){

	
		$sql = "INSERT INTO USUARIO (USERNAME,SEXO,DATANASCIMENTO,RG,CPF,TELEFONE,ENDERECO,CIDADE,INSTITUICAO,CURSO,EMAIL,CATEGORIA,SENHA, ISADMIN, NOME)  VALUES ('$usuario->username',$usuario->sexo, '$usuario->dataNascimento', $usuario->rg, $usuario->cpf, $usuario->telefone, '$usuario->endereco','$usuario->cidade', $usuario->instituicaoEnsino, $usuario->curso, '$usuario->email', $usuario->categoriaUsuario,'$usuario->senha', '$usuario->isadmin', '$usuario->nome')"; 

		$this->exec($sql);
	}

	public function alterar(usuario $usuario){

		 $sql = "UPDATE USUARIO SET SENHA = '$usuario->senha', SEXO = $usuario->sexo, DATANASCIMENTO = '$usuario->dataNascimento', RG = '$usuario->rg', CPF = '$usuario->cpf', TELEFONE = '$usuario->telefone', ENDERECO = '$usuario->endereco', CIDADE = '$usuario->cidade', INSTITUICAO = $usuario->instituicaoEnsino, CURSO = '$usuario->curso' WHERE USERNAME = '$usuario->username'";

		// die($sql);

		
		return $this->exec($sql);
	}

	public function remover(usuario $usuario){
		$sql = "DELETE FROM USUARIO WHERE USERNAME = '$usuario->username'";

		return $this->exec($sql);
	}

	public function selecionar($filtro){
		$sql = "SELECT USERNAME, SENHA FROM USUARIO ";

		if($filtro != ""){
			$sql = $sql . " WHERE USERNAME LIKE '%$filtro%'";; //alt
		}

		$res = $this->mysql->query($sql);
		$retorno = array();

		if ($res->num_rows>0) {
			while($row = $res->fetch_assoc()) {
				array_push($retorno, new usuario($row["USERNAME"], $row["SENHA"]));
			}
		}


		return $retorno;
	}

	public function selecionarUsername($filtro){
		$sql = "SELECT USERNAME, SEXO, DATANASCIMENTO, RG, CPF, TELEFONE, ENDERECO, CIDADE, INSTITUICAO, CURSO, EMAIL, CATEGORIA, SENHA, ISADMIN, NOME FROM USUARIO ";

		if($filtro != ""){
			$sql = $sql . " WHERE USERNAME = '$filtro'"; //alt
		}

		$res = $this->mysql->query($sql);
		$usuario = new usuario();

		if ($res->num_rows>0) {
			while($row = $res->fetch_assoc()) {
				$usuario->username = $row["USERNAME"];
				$usuario->sexo=$row["SEXO"];
				$usuario->dataNascimento=$row["DATANASCIMENTO"];
				$usuario->rg=$row["RG"];
				$usuario->cpf=$row["CPF"];
				$usuario->telefone=$row["TELEFONE"];
				$usuario->endereco=$row["ENDERECO"];
				$usuario->cidade=$row["CIDADE"];
				$usuario->instituicaoEnsino=$row["INSTITUICAO"];
				$usuario->curso=$row["CURSO"];
				$usuario->email=$row["EMAIL"];
				$usuario->categoriaUsuario=$row["CATEGORIA"];
				$usuario->senha = $row["SENHA"];
			}
		}


		return $usuario;
	}
}
?>