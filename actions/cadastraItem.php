<!DOCTYPE html>
<html>
	<head>
		<title>Cadastra Item</title>
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
			session_start();
					
			require_once("../classes/Item.php");
			require_once("../dao/ItemDao.php");

			$item = new  Item();

			
			$item->iteNome=$_GET["txtNome"];
			$item->iteCatCodigo=$_GET["txtCategoria"];
			$item->iteDescricao=$_GET["txtDescricao"];
			$item->iteLocCodigo=$_GET["txtLocal"];
			$item->iteUsuCodigo=$_SESSION["usucodigo"];
			
			$dao = new ItemDao();
			$inseriu = $dao->cadastraItem($item);

			if($_SESSION["usutipo"] == "2"){
				$link = "../forms/formListaItem.php";
			}else{
				$link = "../index.php";
			}
			
			
			if($inseriu){
				$num = 0;
				foreach ($inseriu as $usr) {
					echo "<div data-role='dialog' id='sure' data-title='Atenção !!!' data-defaults='true'>
						  <div data-role='content'>
						    <h3 class='sure-1'>".$inseriu[$num]['RESULT']."</h3>
						    <div class='ui-grid-a'>
							    <a href='#' class='ui-block-a' data-role='button' data-theme='b' data-rel='back'>Voltar</a>
							    <a href='".$link."' class='ui-block-b' data-role='button' data-theme='c'>Continuar</a>
						    </div>
						  </div>
						</div>";
					$num++;
				}
			}		
		?>
	</body>
<html>

