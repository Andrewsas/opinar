<?php
	if($_SESSION["usutipo"] != "2" ){
			
			echo "<div data-role='dialog' id='sure' data-title='Atenção !!!' data-defaults='true'>
						  <div data-role='content'>
						    <h3 class='sure-1'>Você não tem acesso a essa página !</h3>
						    <div class='ui-grid-solo'>
							    <a href='../index.php' onClick='window.location.reload( true );' class='ui-block-a'  data-theme='b' data-role='button' data-theme='c'>Continuar</a>
						    </div>
						  </div>
						</div>";
	}
?>