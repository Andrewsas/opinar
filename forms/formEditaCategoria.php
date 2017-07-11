<!DOCTYPE html>
<html>
	<head>
		<title>Editar Categoria</title>
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

		<?php session_start(); ?>
		
		<?php
			require_once("../actions/verificaSessaoAdministrador.php");
		?>

		<?php
			include("../actions/carregaCategoria.php");
		?>
		<div data-role="page" data-title="Editar Categoria" id="categoria">
			<header data-role="header" data-position="fixed" data-fullscreen="false">
					<h1><input type="search" data-icon="search" data-iconpos="rigth"></input></h1>
			</header>

			<section data-role="content">
			
			<a href="#" data-rel="back"><button data-icon="back" data-iconpos="notext">Voltar</button></a>

			<form method="get" action="../actions/editaCategoria.php">

				<h2>Editar dados Atuais</h2>
				<input type="hidden" name="txtCodigo" id="txtCodigo" value="<?=$categoria->catCodigo?>"></input>
				<div class="ui-field-contain">	
					<label  for="txtNome">Nome da Categoria*</label>
					<input type="text" required id="txtNome" name="txtNome"  placeholder="" value="<?=$categoria->catNome?>" data-clear-btn="true" autocomplete="off"></input>
				</div>

				<div class="ui-field-contain">	
					<label  for="txtImg">URL da imagem da Categoria*</label>
					<input type="text" required id="txtImg" name="txtImg"  placeholder="informatica.jpg" value="<?=$categoria->catImg?>" data-clear-btn="true" autocomplete="off"></input>
				</div>
				<input class="submit" type="submit" value="Finalizar cadastro"></input>
			</form>	
			</section>

			<footer data-role="footer" data-position="fixed">
				<small>Todos direiro Reservados</small>
			</footer>
			
		</div>
	</body>
<html>