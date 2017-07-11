<?php
require_once("../bd/conexaobd.php");

class UsuarioDao{
	public $conn;

	function UsuarioDao(){
		$this->conn = conexao::conectar();
	}

	// Função cadastra usuario *******************************************
	function cadastraUsuario($usuario){
		try{
		
			$sql = "call sp_cadastrausuario(?,?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuEmail);
			$stmt->bindParam(++$num,$usuario->usuNick);
			$stmt->bindParam(++$num,$usuario->usuTipCodigo);
			$stmt->bindParam(++$num,$usuario->usuPassword);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}

// Função cadastra usuario *******************************************
	function exibeUsuarios($usuario){
		try{
		
			$sql = "call sp_exibeusuarios(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuNick);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}


// Função valida usuario *******************************************
	function validaLogin($usuario){
		try{
		
			$sql = "call sp_login(?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuNick);
			$stmt->bindParam(++$num,$usuario->usuPassword);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}


// Função desativa usuario *******************************************
	function desativaUsuario($usuario){
		try{
		
			$sql = "call sp_desativausuario(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}


// Função ativa usuario *******************************************
	function ativaUsuario($usuario){
		try{
		
			$sql = "call sp_ativausuario(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}


// Função deletar usuario *******************************************
	function deletaUsuario($usuario){
		try{
		
			$sql = "call sp_deletausuario(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}

// Função carrega usuario *******************************************
	function carregaUsuario($usuario){
		try{
		
			$sql = "call sp_carregausuario(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}

// Função carrega usuario *******************************************
	function editaUsuario($usuario){
		try{
		
			$sql = "call sp_editausuario(?,?,?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			$stmt->bindParam(++$num,$usuario->usuEmail);
			$stmt->bindParam(++$num,$usuario->usuNick);
			$stmt->bindParam(++$num,$usuario->usuTipCodigo);
			$stmt->bindParam(++$num,$usuario->usuPassword);
			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}

}

?>