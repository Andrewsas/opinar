<?php
require_once("C:/xampp/htdocs/ProjetoFinal/bd/conexaobd.php");

class AvaliaItemDAO{
	public $conn;

	function AvaliaItemDAO(){
		$this->conn = conexao::conectar();
	}

// Função carrega comentario item *******************************************
	function carregaCarregaComentario($item){
		try{
		
			$sql = "call sp_carregacomentario(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			
			// passagem de parametro
			$stmt->bindParam(1,$item);
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



// Função cadastra comentario item *******************************************
	function cadastraComentarioItem($usuario,$item){
		try{
		
			$sql = "call sp_cadastracomentario(?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0;
			// passagem de parametro
			$stmt->bindParam(++$num,$item->iteCodigo);
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			$stmt->bindParam(++$num,$item->iteComentario);
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

// Função gostei item *******************************************
	function gosteiItem($Item,$usuario){
		try{
		
			$sql = "call sp_gostouitem(?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0;
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			$stmt->bindParam(++$num,$Item->iteCodigo);
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
	function naoGosteiItem($Item,$usuario){
		try{
		
			$sql = "call sp_naogostouitem(?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0;
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			$stmt->bindParam(++$num,$Item->iteCodigo);
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
	function denunciaItem($Item,$usuario){ // Recebe dos objetos como parametro
		try{
			// criar string de de comunicação com o banco		
			$sql = "call sp_denunciaitem(?,?);"; // indica que receberá dois parametros
												// procedimento passado para o banco

			//preparando a conexão passando a string 
			$stmt = $this->conn->prepare($sql);
			
			//variavel de auxilio paramentro
			$num = 0;
			
			// estancia parametros
			$stmt->bindParam(++$num,$usuario->usuCodigo);
			$stmt->bindParam(++$num,$Item->iteCodigo);
			
			// executa procedure no banco
			$stmt->execute();

			foreach ($stmt as $usr) { // captura informação de retorno do banco
				$vetor[] = $usr;	// estancia dados trazido do banco em um vetor 
			}

			if(isset($vetor)){ // verifica se o vetor contem dados
				return $vetor;	// se houve dados manda os dados para 
								//serem exibidos pela aplicação
			}

		}catch(Exception $e){ // exceção do bloco trey catch
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}


}
?>