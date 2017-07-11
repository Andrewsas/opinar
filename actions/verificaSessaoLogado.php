<?php


	if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true){
	
			 echo "<div data-role='dialog' id='sure' data-title='Atenção !!!' data-defaults='true'>
						  <div data-role='content'>
						    <h3 class='sure-1'>E necessario login para acessar essa funcionalidade do site !</h3>
						    <div class='ui-grid-solo'>
							    <a href='#'  data-rel='back' onClick='window.location.reload( true );' class='ui-block-a'  data-theme='b' data-role='button' data-theme='c'>Continuar</a>
						    </div>
						  </div>
						</div>";
	}
	

?>