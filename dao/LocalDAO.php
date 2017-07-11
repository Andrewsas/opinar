<?php
require_once("C:/xampp/htdocs/ProjetoFinal/bd/conexaobd.php");

class LocalDao{
	public $conn;

	function LocalDao(){
		$this->conn = conexao::conectar();
	}

// Função cadastra Local *******************************************
	function cadastraLocal($Local){
		try{
		
			$sql = "call sp_cadastralocal(?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$Local->locEstado);
			$stmt->bindParam(++$num,$Local->locMapa);

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

// Exibe todas as Locals **********************************

	function exibeLocal($Local){
		try{
		
			$sql = "call sp_exibelocal(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$Local->locEstado);
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


// Função deleta Local *******************************************
function deletaLocal($Local){
		try{
		
			$sql = "call sp_deletalocal(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$Local->locCodigo);

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


// Função deleta Local *******************************************
function carregaLocal($Local){
		try{
		
			$sql = "call sp_carregalocal(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$Local->locCodigo);

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


// Função edita Local *******************************************
function editaLocal($Local){
		try{
		
			$sql = "call sp_editaLocal(?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$Local->locCodigo);
			$stmt->bindParam(++$num,$Local->locEstado);
			$stmt->bindParam(++$num,$Local->img);
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