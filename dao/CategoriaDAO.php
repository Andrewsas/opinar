<?php
require_once("../bd/conexaobd.php");

class CategoriaDao{
	public $conn;

	function CategoriaDao(){
		$this->conn = conexao::conectar();
	}

// Função cadastra categoria *******************************************
	function cadastraCategoria($categoria){
		try{
		
			$sql = "call sp_cadastracategoria(?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->catNome);
			$stmt->bindParam(++$num,$categoria->catImg);

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

// Exibe todas as Categorias **********************************

	function exibeCategorias($categoria){
		try{
		
			$sql = "call sp_exibecategorias(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->catNome);
			// executa catImgnt
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

// Função desativar categoria *******************************************
	function desativaCategoria($categoria){
		try{
		
			$sql = "call sp_desativacategoria(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->catCodigo);

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

// Função ativar categoria *******************************************
	function ativaCategoria($categoria){
		try{
		
			$sql = "call sp_ativacategoria(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->catCodigo);

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


// Função deleta categoria *******************************************
function deletaCategoria($categoria){
		try{
		
			$sql = "call sp_deletacategoria(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->catCodigo);

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


// Função deleta categoria *******************************************
function carregaCategoria($categoria){
		try{
		
			$sql = "call sp_carregacategoria(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->catCodigo);

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


// Função edita categoria *******************************************
function editaCategoria($categoria){
		try{
		
			$sql = "call sp_editacategoria(?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->catCodigo);
			$stmt->bindParam(++$num,$categoria->catNome);
			$stmt->bindParam(++$num,$categoria->catImg);
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