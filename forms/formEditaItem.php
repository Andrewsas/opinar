<!DOCTYPE html>
<html>
	<head>
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
			require_once("../actions/carregaItem.php");		
		?>

		<div data-role="page" data-title="Cadastro" id="cadastro">
			<header data-role="header" data-position="fixed" data-fullscreen="false">
					<h1><input type="search" data-icon="search" data-iconpos="rigth"></input></h1>
			</header>

			<section data-role="content">
			
			<a href="#" data-rel="back"><button data-icon="back" data-iconpos="notext">Voltar</button></a>

			<form method="get" action="../actions/editaItem.php">
				<input type="hidden" required id="txtCodigo" name="txtCodigo" value="<?=$Item->iteCodigo?>">

				<h2>Editar dados Atuais</h2>
				<div class="ui-field-contain">	
					<label  for="txtCategoria">Categoria*</label>
					<select name="txtCategoria" id="txtCategoria">
						<option value="0" disabled="true" selected="true">Selecione uma opções...</option>
				<?php 
							require_once("../dao/CategoriaDao2.php");

							$dao = new CategoriaDao();
							$inseriu = $dao->exibeCategorias('');

							if($inseriu){
								$num = 0;
								foreach ($inseriu as $usr) {
									if ($Item->iteCatCodigo == $inseriu[$num]['NOME'])
										$seleciona = "selected";
									else
										$seleciona = "";

									echo "<option ".$seleciona." value=".$inseriu[$num]['CODIGO'].">".$inseriu[$num]['NOME']."</option>";
								$num++;
								}
							}
			            ?>
				    </select>
				</div>

				<div class="ui-field-contain">	
					<label  for="txtNome">Nome do Item*</label>
					<input type="text" required id="txtNome" name="txtNome"  placeholder="Smartphone" value="<?=$Item->iteNome?>" data-clear-btn="true" autocomplete="off" maxlength="20">
				</div>

				<div class="ui-field-contain">	
					<label  for="txtDescricao">Descrição*</label>
					<textarea type="text" required id="txtDescricao" name="txtDescricao"  placeholder="Fala do que se trata o produto/serviço" data-clear-btn="true" autocomplete="off" maxlength="299"><?php echo $Item->iteDescricao; ?></textarea>
				</div>
			
				<div class="ui-field-contain">	
					<label  for="txtLocal">Local</label>
						<select name="txtLocal" id="txtLocal">
							<option value="0" disabled="true">Selecione uma opções...</option>
						<?php 
							require_once("../dao/LocalDao.php");
							require_once("../classes/Local.php");

							$Local->locEstado = '';

							$dao = new LocalDao();
							$inseriu = $dao->exibeLocal($Local);

							if($inseriu){
								$num = 0;
								foreach ($inseriu as $usr) {
									if ($Item->iteLocCodigo == $inseriu[$num]['ESTADO'])
										$seleciona = "selected";
									else
										$seleciona = "";

									echo "<option ".$seleciona." value=".$inseriu[$num]['CODIGO'].">".$inseriu[$num]['ESTADO']."</option>";

								$num++;
								}
							}
			            ?>
				    	</select>
				</div>	
				<div class="ui-field-contain">
					<input class="submit" type="submit" value="Finalizar cadastro">
				</div>
			</form>	
			</section>

			<footer data-role="footer" data-position="fixed">
				<small>Todos direiro Reservados</small>
			</footer>
			
		</div>
	</body>
<html>