<?php
require_once("C:/xampp/htdocs/ProjetoFinal/bd/conexaobd.php");

class AvaliaComentarioDAO{
	public $conn;

	function AvaliaComentarioDAO(){
		$this->conn = conexao::conectar();
	}

// Função gostei item *******************************************
	function gosteiCometario($item, $usuario, $usuarioatual){
		try{
		
			$sql = "call sp_gostoucomentario(?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0;
			// passagem de parametro
			$stmt->bindParam(++$num,$usuarioatual);
			$stmt->bindParam(++$num,$item->codigo);
			$stmt->bindParam(++$num,$usuario->codigo);
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


// Função não gostei item *******************************************
	function naogosteiCometario($item, $usuario, $usuarioatual){
		try{
		
			$sql = "call sp_naogostoucomentario(?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0;
			// passagem de parametro
			$stmt->bindParam(++$num,$usuarioatual);
			$stmt->bindParam(++$num,$item->codigo);
			$stmt->bindParam(++$num,$usuario->codigo);
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


// Função denuncia item *******************************************
	function denunciaCometario($item, $usuario, $usuarioatual){
		try{
		
			$sql = "call sp_denunciaomentario(?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0;
			// passagem de parametro
			$stmt->bindParam(++$num,$usuarioatual);
			$stmt->bindParam(++$num,$item->codigo);
			$stmt->bindParam(++$num,$usuario->codigo);
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