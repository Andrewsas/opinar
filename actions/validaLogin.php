<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
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

			require_once("../classes/Usuario.php");
			require_once("../dao/UsuarioDao.php");

			$usuario = new  Usuario();

			
			$usuario->usuNick=$_POST["txtEmailLogin"];
			$usuario->usuPassword=$_POST["txtPassword"];
			
			$dao = new UsuarioDao();
			$inseriu = $dao->validaLogin($usuario);

			if($inseriu){
				$num = 0;
				foreach ($inseriu as $usr) {

					$_SESSION["usunick"] = $inseriu[$num]['NICK'];
					$_SESSION["usucodigo"] = $inseriu[$num]['CODIGO'];
					$_SESSION["usutipo"] = $inseriu[$num]['TIPO'];
					$_SESSION["usuemail"] = $inseriu[$num]['EMAIL'];						

					if (!isset($_SESSION["usucodigo"])) {

						session_destroy();
						echo "<div data-role='dialog' id='sure' data-title='Atenção !!!' data-defaults='true'>
							  <div data-role='content'>
							    <h3 class='sure-1'>".$inseriu[$num]['RESULT']."</h3>
							    <div class='ui-grid-a'>
								    <a href='#' class='ui-block-solo' data-role='button' data-theme='b' data-rel='back'>Voltar</a>
							    </div>
							  </div>
							</div>";		
					}else{
						$_SESSION["logado"] = true;

						echo "<script>
							window.open('../index.php','_top');
						</script>";
					}

					$num++;
				}
				
			}		
		?>
	</body>
<html>

