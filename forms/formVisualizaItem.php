<!DOCTYPE html>
<html>
	<head>
		<title>OI</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="../js/jquery-1.12.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery.mobile-1.4.5.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/jquery.mobile-1.4.5.css">
		<script type="text/javascript" src="js/rq_ajax.js"></script>
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

		</style>

		<script type="text/javascript">
			
		</script>


	<head>

	<body>
		
		<?php
			require_once("../actions/carregaItem.php");		
		?>

		<div data-role="page" data-title="Home">
			<header data-role="header" data-position="fixed" data-fullscreen="false">
					<h1>
						<form  method="GET" action="index.php">
							<input type="search" name="txtNome" id="txtNome" data-icon="search" data-iconpos="rigth"></input>
						</form>
					</h1>
			</header>
			

			<section data-role="content">
				<a href="#" data-rel="back"><button data-icon="back" data-iconpos="notext">Voltar</button></a>
				<div class="item">


	<?php
			require_once("../actions/carregaItem.php"); /*requisição de dados do banco*/		
	?>
	<div id="item"> <!-- conteiner com dados do item -->
		<div class="conteudo">
			<h1><?=$Item->iteNome?></h1> <!-- carrega nome --> 
			<h3><?=$Item->iteCatCodigo?></h3> <!-- carrega Categoria --> 
			<figure class="img"> <!-- tras endereço da imagem da categoria do item -->
				<img src="<?=$Categoria->catImg?>" style="width: 80%;">
			</figure>
			<p><?=$Item->iteDescricao?></p> <!-- carrega a descrição do item -->
		</div>
		<div class="ui-grid-b"> <!-- chama função de avaliação, passamos parametrotros --> 
			  <!-- de codigo e tipo de avaliação -->
			<!-- botão de Like -->
			<button class="ui-block-a" data-theme="a" id="btnGostei" onclick="f_avalia(<?=$Item->iteCodigo?>, 1, 'btnGostei')">Gostei</button>
			<!-- botão de deslike -->
			<button class="ui-block-b" data-theme="a" id="btnNGostei" onclick="f_avalia(<?=$Item->iteCodigo?>, 2, 'btnNGostei')">Não Gostei</button>
			<!-- botão de denúncia -->
			<button class="ui-block-c" data-theme="a" id="btnDenucia" onclick="f_avalia(<?=$Item->iteCodigo?>, 3)">Denúcia</button>
		</div>
	</div>



					<div class="comentario">
						<!-- nome do usuario logado-->
						<h3>Contribua com seu comentario</h3>
						<form method="GET" action="../actions/cadastraComentarioItem.php">
							<input type="hidden" name="txtItemCodigo" id="txtItemCodigo" value="<?=$Item->iteCodigo?>"></input>
							<textarea type="text" required id="txtItemComentario" name="txtItemComentario"  placeholder="Digite aqui seu comentario sobre o item." value="" data-clear-btn="true" autocomplete="off" maxlength="150"></textarea>
							<input class="submit" type="submit" value="Enviar">
						</form>						
						<hr>
						<br>
						<!-- <?php/*
							require_once("../dao/AvaliaItemDAO.php");

							$item = $_GET["txtCodigo"];

							$dao = new AvaliaItemDAO();
							$inseriu = $dao->carregaCarregaComentario($item);

							if($inseriu){
								$num = 0;
								foreach ($inseriu as $usr) {
									if(isset($inseriu[$num]['CODIGO_USUARIO'])){
										echo"
											<h4>".$inseriu[$num]['NICK']."</h4>
											<p>".$inseriu[$num]['COMENTARIO']."</p>
											<ul>
												<li><a href=../actions/gosteiComentario.php?txtUsuarioCodigo=".$inseriu[$num]['CODIGO_USUARIO']."&txtItemCodigo=".$Item->iteCodigo.">Gostei</a></li>
												<li><a href=../actions/naogosteiComentario.php?txtUsuarioCodigo=".$inseriu[$num]['CODIGO_USUARIO']."&txtItemCodigo=".$Item->iteCodigo.">Não Gostei</a></li>
												<li><a href='#' >Denucia</a></li>
												</ul>
											<br>
										";
									}else{
										echo "<h5>".$inseriu[$num]['RESULT']."</h5>";
									}
								$num++;
								}
							}*/
						?> -->
					</div>
				</div>
				
			</section>


	

			<footer data-role="footer" data-position="fixed">
				<small>Todos direiro Reservados</small>
			</footer>		
		</div>
	</body>
<html>