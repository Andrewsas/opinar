<!DOCTYPE html>
<html>
	<head>
		<title>Carrega Categoria</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="../js/jquery-1.12.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery.mobile-1.4.5.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/jquery.mobile-1.4.5.css">
		<style type="text/css">
			/* Start with core styles outside of a media query that apply to mobile and up */
			/* Global typography and design elements, stacked containers */
			body { font-family: Helvetica, san-serif; }
			H1 { color: green; }
			a:link { color:purple; }

			/* Stack the two content containers */
			.main,
			.sidebar { display:block; width:100%; }

			/* First breakpoint at 576px */
			/* Inherits mobile styles, but floats containers to make columns */
			@media all and (min-width: 36em){
				.main { float: left; width:60%; }
				.sidebar { float: left; width:40%; }
			}

			/* Second breakpoint at 800px */
			/* Adjusts column proportions, tweaks base H1 */
			@media all and (min-width: 50em){
				.main { width:70%; }
				.sidebar { width:30%; }

				/* You can also tweak any other styles in a breakpoint */
				H1 { color: blue; font-size:1.2em }
			}
		</style>
	<head>

	<body>
		<?php
	
			require_once("../classes/Categoria.php");
			require_once("../dao/CategoriaDao.php");

			$categoria = new  Categoria();

			$categoria->catCodigo=$_GET["txtCodigo"];
			
			$dao = new CategoriaDao();
			$inseriu = $dao->carregaCategoria($categoria);

			if($inseriu){
				$num = 0;
				foreach ($inseriu as $usr) {
					$categoria->catCodigo = $inseriu[$num]['CODIGO'];
					$categoria->catNome = $inseriu[$num]['CATEGORIA'];
					$categoria->catImg = $inseriu[$num]['IMG'];
					$num++;
				}
			}		
		?>
	</body>
<html>