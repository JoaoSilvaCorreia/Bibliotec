<?php
	include_once("../Entities/livro.php"); 
	include_once("../DAO/livroDAO.php");
	class livroBO{
		public $dao;

		function __construct(){
			$this->dao = new livroDAO();
		}

		
		//Regras de negócio
		public function inserir(livro $livros)
		{ 

			$validador = new Validador;
			if ($livros->titulo == "") {
				$validador->isValid = false;
				$validador->errors['titulo'] = '*Campo obrigatório';

			 }

			 if ($livros->autor == "") {
				$validador->isValid = false;
				$validador->errors['autor'] = '*Campo obrigatório';

			 }


			 if ($livros->assunto == "") {
				$validador->isValid = false;
				$validador->errors['assunto'] = '*Campo obrigatório';

			 }


			 if ($livros->editora == "") {
				$validador->isValid = false;
				$validador->errors['editora'] = '*Campo obrigatório';

			 }

			 if ($livros->edicao == "") {
				$validador->isValid = false;
				$validador->errors['edicao'] = '*Campo obrigatório';

			 }

			 if ($livros->numpaginas == "") {
				$validador->isValid = false;
				$validador->errors['numpaginas'] = '*Campo obrigatório';

			 }

			 if ($livros->ano == "") {
				$validador->isValid = false;
				$validador->errors['ano'] = '*Campo obrigatório';

			 }


			 if($this->dao->existeLivro($livros->titulo)){
				$validador->isValid = false;
				$validador->errors['titulo'] = '*Já existe um livro com este título';
			}
			
			
			if ($validador->isValid) {
				$this->dao->inserir($livros);
			}
			return $validador;
		}

		public function alterar(livro $livros){

			$validador = new Validador;
				if ($livros->titulo == "") {
				$validador->isValid = false;
				$validador->errors['titulo'] = '*Campo obrigatório';

			 }

			 if ($livros->autor == "") {
				$validador->isValid = false;
				$validador->errors['autor'] = '*Campo obrigatório';

			 }


			 if ($livros->assunto == "") {
				$validador->isValid = false;
				$validador->errors['assunto'] = '*Campo obrigatório';

			 }


			 if ($livros->editora == "") {
				$validador->isValid = false;
				$validador->errors['editora'] = '*Campo obrigatório';

			 }

			 if ($livros->edicao == "") {
				$validador->isValid = false;
				$validador->errors['edicao'] = '*Campo obrigatório';

			 }

			 if ($livros->numpaginas == "") {
				$validador->isValid = false;
				$validador->errors['numpaginas'] = '*Campo obrigatório';

			 }

			 if ($livros->ano == "") {
				$validador->isValid = false;
				$validador->errors['ano'] = '*Campo obrigatório';

			 }

			if ($validador->isValid) {
				$this->dao->alterar($livros);
				$validador->isValid = true;
			}
			return $validador;
		}

		

		public function remover(livro $livros){
			$validador = new Validador;
			$validador->isValid = $this->dao->remover($livros);
			return $validador;
		}

		public function selecionar($filtro){
			return $this->dao->selecionar($filtro);
		}
		public function selecionarId($id){
			return $this->dao->selecionarId($id);
		}
	}
?>
