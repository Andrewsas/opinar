<?php
require_once("C:/xampp/htdocs/ProjetoFinal/bd/conexaobd.php");

class ItemDao{
	public $conn;

	function ItemDao(){
		$this->conn = conexao::conectar();
	}

// Função cadastra item *******************************************
	function cadastraItem($item){
		try{
		
			$sql = "call sp_cadastraitem(?,?,?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteUsuCodigo);
			$stmt->bindParam(++$num,$item->iteCatCodigo);
			$stmt->bindParam(++$num,$item->iteLocCodigo);
			$stmt->bindParam(++$num,$item->iteNome);
			$stmt->bindParam(++$num,$item->iteDescricao);
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

	// **********************************************

	function exibeItens($item){
		try{
		
			$sql = "call sp_exibeitens(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteNome);
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


// Função desativa item *******************************************
	function desativaItem($item){
		try{
		
			$sql = "call sp_desativaitem(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteCodigo);
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

// Função ativa item *******************************************
	function ativaItem($item){
		try{
		
			$sql = "call sp_ativaitem(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteCodigo);
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


// Função deleta item *******************************************
	function deletaItem($item){
		try{
		
			$sql = "call sp_deletaitem(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteCodigo);
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

// Função bucar item *******************************************
	function buscaItem($item){
		try{
		
			$sql = "call sp_buscaitem(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteNome);
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


// Função carrega item *******************************************
	function carregaItem($item){
		try{
		
			$sql = "call sp_carregaitem(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteCodigo);
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


// Função edita item *******************************************
	function editaItem($item){
		try{
		
			$sql = "call sp_editaitem(?,?,?,?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteCodigo);
			$stmt->bindParam(++$num,$item->iteUsuCodigo);
			$stmt->bindParam(++$num,$item->iteCatCodigo);
			$stmt->bindParam(++$num,$item->iteLocCodigo);
			$stmt->bindParam(++$num,$item->iteNome);
			$stmt->bindParam(++$num,$item->iteDescricao);

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