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
		<div data-role="page" data-title="Login">
			<header data-role="header" data-position="fixed" data-fullscreen="false">
					<h1><input type="search" data-icon="search" data-iconpos="rigth"></input></h1>
			</header>

			<section data-role="content">

			<a href="#" data-rel="back"><button data-icon="back" data-iconpos="notext">Voltar</button></a>
			
			<form  method="post" action="../actions/validaLogin.php">	
				<h2>Login</h2>
				
				<div class="ui-field-contain">	
					<label  for="txtEmailLogin">E-mail* ou Nickname</label>
					<input type="text" required id="txtEmailLogin" name="txtEmailLogin"  placeholder="joao@email.com" value="" data-clear-btn="true" autocomplete="off">
				</div>

				<div class="ui-field-contain">	
					<label  for="txtPassword">Senha*</label>
					<input type="password" required id="txtPassword" name="txtPassword"  placeholder="**********" value="" data-clear-btn="true" autocomplete="off">
				</div>

				<a href="formCadastroUsuario.php">Cadastre-se aqui</a>
				<input class="submit" type="submit" value="Entrar">
			
			</form>

			</section>

			<footer data-role="footer" data-position="fixed">
				<small>Todos direiro Reservados</small>
			</footer>
			
		</div>
	</body>
<html>