
<?php
	if(empty($_POST["r"])){

		?>
			<div class="alert alert-danger" role="alert">
				Campos sin llenar!
			</div>
		<?php

		if (empty($_POST["nombre"]) or empty($_POST["numero"]) or empty($_POST["correo"]) or empty($_POST["password"]) or empty($_POST["passConf"]) ) {
			
			?>
			<div class="alert alert-danger" role="alert">
				Campos sin llenar!
			</div>
			<?php


		}else{
			// code...
			
		}
	}
?>