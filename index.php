<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); ?>
		<title>OI</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery-1.12.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.4.5.min.js"></script>
		<script type="text/javascript" src="js/rq_ajax.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.5.css">
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
			a{

			}
		</style>
	<head>

	<body>
		<div data-role="page" data-title="Home">
			<header data-role="header" data-position="fixed" data-fullscreen="false">
					<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
					<h1>
						<form  method="GET" action="index.php">
							<input type="search" name="txtNome" id="txtNome" data-icon="search" data-iconpos="rigth"></input>
						</form>
					</h1>
					<nav data-role="navbar">
						<ul>
							<li><a href="#">Recentes</a></li>
							<li><a href="#">+ Avaliados</a></li>
						</ul>
					</nav>
			</header>
			
			<aside data-role="aside">
				<div id="nav-panel" data-role="panel" data-theme="b" data-display="push" data-position-fixed="true">
			        <ul data-role="listview">
			            <li>
			            	<?php
			            		

			            		if (isset($_SESSION["usucodigo"])){
			            			
			            			echo "<a href='actions/destroiSessao.php'>Sair</a>
			            				<h3>".$_SESSION["usunick"]."</h3>
			            				<p>".$_SESSION["usuemail"]."</p>
			            				";
			            		}
			            		else{
			            			echo "<a href='forms/formLogin.php'>Login</a>";
			            		}
			            		
			            	?>
			            </li>
			            <br>
			            <br>
			            <br>
			            <a href="forms/formCadastroItem.php"><button data-icon="plus" data-iconpos="top">Adicionar Item</button></a>
			            <?php 
							require_once("C:/xampp/htdocs/ProjetoFinal/classes/Categoria.php");
							require_once("C:/xampp/htdocs/ProjetoFinal/dao/CategoriaDao.php");

							$categoria = new  Categoria();

							$categoria->catNome= "";
							

							$dao = new CategoriaDao();
							$inseriu = $dao->exibeCategorias($categoria);

							if($inseriu){
								$num = 0;
								foreach ($inseriu as $usr) {
									echo "<li><a href='index.php?txtNome=".$inseriu[$num]['NOME']."'".$inseriu[$num]['CODIGO']."'>".$inseriu[$num]['NOME']."</a></li>";
								$num++;
								}
							}
			            ?>
			        </ul>
			    </div><!-- /panel -->
			</aside>

			<section data-role="content">

				<?php 
					
					require_once("C:/xampp/htdocs/ProjetoFinal/classes/Item.php");
					require_once("C:/xampp/htdocs/ProjetoFinal/dao/ItemDao.php");

					$item = new  Item();

					if(isset($_GET["txtNome"])){
					$item->iteNome=$_GET["txtNome"];			
					}else{
						$item->iteNome= "";
					}

				
					$dao = new ItemDao();
					$inseriu = $dao->buscaItem($item);

					if($inseriu){
						$num = 0;
						foreach ($inseriu as $usr) {
						
							echo "	<a href='forms/formVisualizaItem.php?txtCodigo=".$inseriu[$num]['CODIGO']."' class='ui-btn' style='display: block;'>
										<img src='".$inseriu[$num]['IMAGEM']."' style='width: 25%; float: left;'>
										<h3 style='font-size:1em; position: relative;'>".$inseriu[$num]['NOME']."</h3>
										<p style='position: relative;'>".$inseriu[$num]['CATEGORIA']."</p>
									</a>
									";	

							$num++;
						}
					}
			    ?>
			</section>

			<footer data-role="footer" data-position="fixed">
				<small>Todos direiro Reservados</small>
			</footer>
			
		</div>
	</body>
<html>
