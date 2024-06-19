<?php

class Livro{
	public $id;
	public $titulo;
	public $autor;
	public $assunto;
	public $editora;
	public $edicao;
	public $numPaginas;
	public $ano;
	public $arquivo;
	
	public function __construct($titulo = null,$autor = null,$assunto = null,$editora = null,$edicao = null,$numPaginas = null,$ano = null, $id = null, $arquivo = null) {

		$this->titulo = $titulo;
        $this->autor = $autor;
        $this->assunto = $assunto;
        $this->editora = $editora;
        $this->edicao = $edicao;
        $this->numPaginas = $numPaginas;
        $this->ano = $ano;
  		$this->id = $id;
  		$this->arquivo = $arquivo;

}


}

?>