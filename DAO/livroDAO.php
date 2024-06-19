<?php
include_once("basicDAO.php");
include_once("../Entities/livro.php");
class livroDAO extends basicDAO{


	public function existeLivro($titulo){
		$sql = "SELECT TITULO FROM LIVROS WHERE TITULO = '$titulo'"; //alt
		

		$res = $this->mysql->query($sql);
		

		if ($res->num_rows>0) {
			return true;
		}

		return false;
	}

	public function inserir(livro $livros){

		echo(var_dump($livros));
		$sql = "INSERT INTO LIVROS (TITULO,AUTOR,ASSUNTO,EDITORA,EDICAO,NUMPAGINAS,ANO,ARQUIVO)  VALUES ('$livros->titulo','$livros->autor', '$livros->assunto', '$livros->editora', '$livros->edicao', $livros->numpaginas, $livros->ano, '$livros->arquivo')"; 

		$this->exec($sql);
	}

	public function alterar(livro $livro){
		$sql = "UPDATE LIVROS SET TITULO =  '$livro->titulo',AUTOR = '$livro->autor', ASSUNTO = '$livro->assunto', EDITORA = '$livro->editora', EDICAO = $livro->edicao, NUMPAGINAS = $livro->numpaginas, ANO = $livro->ano WHERE ID = $livro->id";

		$this->exec($sql);
	}

	public function remover(livro $livro){
		$sql = "DELETE FROM LIVROS WHERE ID = $livro->id";
		return $this->exec($sql);
	}

	public function selecionar($filtro){
		$sql = "SELECT ID, TITULO, AUTOR, ASSUNTO,EDITORA,EDICAO,NUMPAGINAS,ANO, ARQUIVO FROM LIVROS ";

		if($filtro != ""){
			$sql = $sql . " WHERE TITULO LIKE '%$filtro%'"; //alt
		}

		$res = $this->mysql->query($sql);
		$retorno = array();

		if ($res->num_rows>0) {
			while($row = $res->fetch_assoc()) {
				array_push($retorno, new livro($row["TITULO"], $row["AUTOR"], $row["ASSUNTO"], $row["EDITORA"], $row["EDICAO"], $row["NUMPAGINAS"], $row["ANO"], $row["ID"], $row["ARQUIVO"]));
			}
		}

		return $retorno;
	}

	public function selecionarId($id){
		$sql = "SELECT ID, TITULO, AUTOR, ASSUNTO,EDITORA,EDICAO,NUMPAGINAS,ANO,ARQUIVO FROM LIVROS  WHERE ID = $id"; //alt
		

		$res = $this->mysql->query($sql);
		$retorno = null;

		if ($res->num_rows>0) {
			while($row = $res->fetch_assoc()) {
				$retorno = new livro($row["TITULO"], $row["AUTOR"], $row["ASSUNTO"], $row["EDITORA"], $row["EDICAO"], $row["NUMPAGINAS"], $row["ANO"],  $row["ID"],$row["ARQUIVO"]);
			}
		}

		return $retorno;
	}
}
?>
