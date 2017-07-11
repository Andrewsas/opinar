<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); ?>
		<title>Cadastro</title>
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
			require_once("../actions/verificaSessaoAdministrador.php");
		?>
		
		<div data-role="page" data-title="Cadastro" id="cadastro">
			<header data-role="header" data-position="fixed" data-fullscreen="false">
					<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
					<h1><input type="search" data-icon="search" data-iconpos="rigth"></input></h1>
			</header>
			
			<aside data-role="aside">
				<div id="nav-panel" data-role="panel" data-theme="b" data-display="push" data-position-fixed="true">
			        <ul data-role="listview">
			            <li>
			            	<?php
			            		if (isset($_SESSION["usucodigo"])){
			            			
			            			echo "<a href='../actions/destroiSessao.php'>Sair</a>
			            				<h3>".$_SESSION["usunick"]."</h3>
			            				<p>".$_SESSION["usuemail"]."</p>
			            				";
			            		}
			            		else{
			            			echo "<a href='formLogin.php'>Login</a>";
			            		}
			            		
			            	?>
			            </li>
			            <br>
			            <br>
			            <br>
			            <li><a href="formListaItem.php">Item</a></li>
			            <li><a href="formListaCategoria.php">Categoria</a></li>
			            <li><a href="formListaUsuario.php">Usuarios</a></li>
			            <li><a href="formListaLocal.php">Local</a></li>
			        </ul>
			    </div><!-- /panel -->
			</aside>

			<section data-role="content">
			
			<a href="#" data-rel="back"><button data-icon="back" data-iconpos="notext">Voltar</button></a>


			</section>

			<footer data-role="footer" data-position="fixed">
				<small>Todos direiro Reservados</small>
			</footer>
			
		</div>
	</body>
<html>