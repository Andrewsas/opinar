<!DOCTYPE html>
<html>
	<head>
		<title>Listar Categoria</title>
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

				table img{
					width: 5em;
				}
			}
		</style>
	<head>

	<body>
		<?php session_start(); ?>
		
		<?php
			require_once("../actions/verificaSessaoAdministrador.php");
		?>
		<div data-role="page" data-title="Listar Categoria" id="categora">
			<header data-role="header" data-position="fixed" data-fullscreen="false">
					<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
					<h1>
						<form method="GET" action="formListaCategoria.php">
							<input type="search" name="txtNome" id="txtNome" data-icon="search" data-iconpos="rigth" value=""></input>
						</form>
					</h1>
			</header>
			
			<aside data-role="aside">
				<div id="nav-panel" data-role="panel" data-theme="b" data-display="push" data-position-fixed="true">
			        <ul data-role="listview">
			            <li><a href="../forms/formLogin.php">Login</a></li>
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
			
			<a href="#" data-rel="back" style="float:left;"><button data-icon="back" data-iconpos="notext">Voltar</button></a>
			<a href="formCadastroLocal.php" style="float:right;"><button data-icon="plus" data-iconpos="notext">Adicionar</button></a>
			
			<?php
				require_once("../classes/Local.php");
				require_once("../dao/LocalDao.php");

				$local = new  Local();

				if(isset($_GET["txtNome"])){
					$local->locEstado=$_GET["txtNome"];			
				}else{
					$local->locEstado= "";
				}

				$dao = new LocalDao();
				$inseriu = $dao->exibeLocal($local);

				if($inseriu){
					echo "	<table data-role='table' data-mode=' class='ui-responsive table-stroke'>
									<tr>
										<th>CODIGO</th>
										<th>ESTADO</th>
										<th>MAPA</th>
										<th>CRUD</th>
									</tr>
							";
					$num = 0;
					foreach ($inseriu as $usr) {
						echo "
									<tr>
										<td>".$inseriu[$num]['CODIGO']."</td>
										<td>".$inseriu[$num]['ESTADO']."</td>
										<td>".$inseriu[$num]['MAPA']."</td>
										<td>
										<div class='ui-grid-e center'>
											<a href='../forms/formEditaLocal.php?txtCodigo=".$inseriu[$num]['CODIGO']."'><button style='float:left;' data-icon='refresh' data-iconpos='notext'>Atualizar</button></a>
											<a href='../actions/deletaLocal.php?txtCodigo=".$inseriu[$num]['CODIGO']."'><button style='float:left;' data-icon='delete' data-iconpos='notext'>Deleta</button></a>
										<div>
										</td>
									</tr>";
						$num++;
					}
					echo "</table>";
				}		

			?>

			</section>

			<footer data-role="footer" data-position="fixed">
				<small>Todos direiro Reservados</small>
			</footer>
			
		</div>
	</body>
<html>