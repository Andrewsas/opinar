<?php
			require_once("../classes/Local.php");
			require_once("../dao/LocalDao.php");

			$Local = new  Local();

			$Local->locCodigo=$_GET["txtCodigo"];
			
			$dao = new LocalDao();
			$inseriu = $dao->carregaLocal($Local);

			if($inseriu){
				$num = 0;
				foreach ($inseriu as $usr) {
					$Local->locCodigo = $inseriu[$num]['CODIGO'];
					$Local->locEstado = $inseriu[$num]['ESTADO'];
					$Local->locMapa = $inseriu[$num]['MAPA'];
					$num++;
				}
			}		
		?>