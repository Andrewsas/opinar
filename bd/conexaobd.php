	<?php
	class conexao{

		static function conectar(){

			$host = "177.91.232.234";
			$dbname = "opinar";
			$user = "root";
			$password = "ifam2016";
			
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
