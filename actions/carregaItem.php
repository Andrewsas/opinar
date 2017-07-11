		<?php
	
			require_once("../classes/Item.php");
			require_once("../classes/Categoria.php");
			require_once("../dao/ItemDao.php");

			$Item = new  Item();
			$Categoria = new  Categoria();

			$Item->iteCodigo=$_GET["txtCodigo"];

			
			$dao = new ItemDao();
			$inseriu = $dao->carregaItem($Item);

			if($inseriu){
				$num = 0;
				foreach ($inseriu as $usr) {
					$Item->iteCodigo = $inseriu[$num]['CODIGO'];
					$Item->iteNome = $inseriu[$num]['NOME'];
					$Item->iteDescricao = $inseriu[$num]['DESCRICAO'];
					$Item->iteLocCodigo = $inseriu[$num]['ESTADO'];
					$Item->iteCatCodigo = $inseriu[$num]['CATEGORIA'];
					$Categoria->catImg = $inseriu[$num]['IMAGEM'];
					$num++;
				}
			}		
		?>
