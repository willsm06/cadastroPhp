<!DOCTYPE html>
<html lang="pt-br">
	
<head>
	<meta charset="utf-8">
	<title>Formulário</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
	<?php
require_once "includes/header.php";
?>
	<div class="principal">
		<div class="container">
			<div class="titulo-principal">Formulário de Login</div>
			<form name="formulario" method="post" action="validar.php">
				<fieldset id="identificacao" class="input-form">
					<legend>Identificação</legend>
					<div class="coluna coluna1">
						<label for="txtNome">Nome Completo: *</label>
						<input type="text" name="txtNome" id="txtNome" class="txtnome" maxlength="100" required>
					</div>
                    <div class="coluna coluna3">
							<label for="txtPass">Senha: *</label>
							<input type="password" name="txtPass" id="txtPass" class="tamanho" required>
						</div>
						</div>
					</div>
				</fieldset>
				<button type="submit" class="sucess">Enviar</button>
				<button type="reset" class="btn-danger">Cancelar</button>
		</div>
        <a href="cadastro.php">Cadastre-se</a>
	</div>
	<?php
require_once "includes/footer.php";
?>
</body>

</html>