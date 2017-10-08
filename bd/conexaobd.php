	<?php
	class conexao{

		static function conectar(){

			$host = "localhost";
			$dbname = "opinar";
			$user = "root";
			$password = "1nf0rm4t1c4";
			
			try{
				$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $conn;

			}catch(Exception $e){
				echo "Erro de conexão com BD - bd.php " . $e->getMessage();
			}
		}
	}
	?>	
