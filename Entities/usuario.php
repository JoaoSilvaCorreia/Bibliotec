<?php
class usuario{
	public $id;
	public $username;
	public $sexo;
	public $dataNascimento;
	public $rg;
	public $cpf;
	public $telefone;
	public $endereco;
	public $cidade;
	public $instituicaoEnsino;
	public $curso;
	public $email;
	public $categoriaUsuario;
	public $senha;
	public $tipo;
	#public $nome;

	public function __construct($username = null, $senha = null){
		$this->username = $username;
		$this->senha = $senha;
	}
}

?>
