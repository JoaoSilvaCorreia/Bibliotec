<?php
	include_once("../Entities/usuario.php"); 
	include_once("../DAO/usuarioDAO.php");
	include_once("../Helpers/Validador.php");
	class usuarioBO{
		public $dao;

		function __construct(){
			$this->dao = new usuarioDAO();
		}

		public function autenticar($username, $senha){
			$parametro = new usuario;
			$parametro->username=$username;
			$parametro->senha=$senha;
			$user = $this->dao->autenticar($parametro);
			echo var_dump($user);


			if($username == ""){
					return new usuario;
				}



			if ($username == $user->username && $senha == $user->senha) {
				
				
				return $user;
			}

			else
				return new usuario;
		}
		//Regras de negócio
		public function inserir(usuario $usuario)
		{ 	
			$validador = new Validador;
			if ($usuario->username == "") {
				$validador->isValid = false;
				$validador->errors['username'] = '*Campo obrigatório';

			 }

			 if ($usuario->sexo == "") {
				$validador->isValid = false;
				$validador->errors['sexo'] = '*Campo obrigatório';

			 }
  

  			  if ($usuario->dataNascimento == "") {
				$validador->isValid = false;
				$validador->errors['dataNascimento'] = '*Campo obrigatório Ex: 2017-12-31';

			 }
  
			 
			 if ($usuario->rg == "") {
				$validador->isValid = false;
				$validador->errors['rg'] = '*Campo obrigatório';

			 }
  
  			 if ($usuario->cpf == "") {
				$validador->isValid = false;
				$validador->errors['cpf'] = '*Campo obrigatório';

			 }
  		
  			 if ($usuario->telefone == "") {
				$validador->isValid = false;
				$validador->errors['telefone'] = '*Campo obrigatório';

			 }
  

			  if ($usuario->endereco == "") {
				$validador->isValid = false;
				$validador->errors['endereco'] = '*Campo obrigatório';

			 }
  

  			 if ($usuario->cidade == "") {
				$validador->isValid = false;
				$validador->errors['cidade'] = '*Campo obrigatório';

			 }


			  if ($usuario->instituicaoEnsino == "") {
				$validador->isValid = false;
				$validador->errors['instituicaoEnsino'] = '*Campo obrigatório';

			 }
  	

  			  if ($usuario->curso == "") {
				$validador->isValid = false;
				$validador->errors['curso'] = '*Campo obrigatório';

			 }
  
  			 if ($usuario->email == "") {
				$validador->isValid = false;
				$validador->errors['email'] = '*Campo obrigatório';

			 }


			 if ($usuario->categoriaUsuario == "") {
				$validador->isValid = false;
				$validador->errors['categoriaUsuario'] = '*Campo obrigatório';

			 }
  
  
			 if($usuario->senha == ""){
				$validador->isValid = false;	
				$validador->errors['senha'] = '*Campo obrigatório';	
			}


			 if($this->dao->existeUsername($usuario->username)){
				$validador->isValid = false;
				$validador->errors['username'] = '*Já existe um usuário com este login';
			}
			
			if ($validador->isValid) {
				$this->dao->inserir($usuario);
			}
			return $validador;
		}

		

		public function alterar(usuario $usuario){

			$validador = new Validador;

			if ($usuario->username == "") {
				$validador->isValid = false;
				$validador->errors['username'] = '*Campo obrigatório';

			 }

			 if ($usuario->sexo == "") {
				$validador->isValid = false;
				$validador->errors['sexo'] = '*Campo obrigatório';

			 }
  

  			  if ($usuario->dataNascimento == "") {
				$validador->isValid = false;
				$validador->errors['dataNascimento'] = '*Campo obrigatório';

			 }
  
			 
			 if ($usuario->rg == "") {
				$validador->isValid = false;
				$validador->errors['rg'] = '*Campo obrigatório';

			 }
  
  			 if ($usuario->cpf == "") {
				$validador->isValid = false;
				$validador->errors['cpf'] = '*Campo obrigatório';

			 }
  		
  			 if ($usuario->telefone == "") {
				$validador->isValid = false;
				$validador->errors['telefone'] = '*Campo obrigatório';

			 }
  

			  if ($usuario->endereco == "") {
				$validador->isValid = false;
				$validador->errors['endereco'] = '*Campo obrigatório';

			 }
  

  			 if ($usuario->cidade == "") {
				$validador->isValid = false;
				$validador->errors['cidade'] = '*Campo obrigatório';

			 }


			  if ($usuario->instituicaoEnsino == "") {
				$validador->isValid = false;
				$validador->errors['instituicaoEnsino'] = '*Campo obrigatório';

			 }
  	

  			  if ($usuario->curso == "") {
				$validador->isValid = false;
				$validador->errors['curso'] = '*Campo obrigatório';

			 }
  
  			 if ($usuario->email == "") {
				$validador->isValid = false;
				$validador->errors['email'] = '*Campo obrigatório';

			 }


  
  
			 if($usuario->senha == ""){
				$validador->isValid = false;	
				$validador->errors['senha'] = '*Campo obrigatório';	
			}
			
			if ($validador->isValid) {
				$this->dao->alterar($usuario);
				$validador->isValid = true;
			}
			return $validador;
		}


		public function remover(usuario $usuario){
			$validador = new Validador;
			$validador->isValid = $this->dao->remover($usuario);
			return $validador;
		}



		public function selecionar($filtro){
			return $this->dao->selecionar($filtro);
		}
		public function selecionarUsername($filtro){
			return $this->dao->selecionarUsername($filtro);
		}
	}

?>