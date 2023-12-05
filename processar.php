<?php
	require_once "includes/conexao.php";

	$nome = $_POST["txtNome"];
	$rg = $_POST["txtRG"];
	$cpf = $_POST["txtCPF"];
	$nasc = $_POST["txtNasc"];
	$sexo = $_POST["rdoSexo"];
	$pass = $_POST["txtPass"];
	$confpass = $_POST["txtConfPass"];
	$pass = hash("sha512", md5($pass));
	$confpass = hash("sha512", md5($confpass));
	$time = hash("sha512", md5(time()));

	if($pass != $confpass){
		echo "senha nao confere";
		die();
	}
	else{}

	$foto = $_FILES["foto"]["name"];
		
	//echo date('d');
	$novoNomeimg = hash('sha512',md5(time()));

	//$NOMEF=pathinfo($foto, PATHINFO_FILENAME);
	//echo $foto	

	$extRealfoto=pathinfo($foto, PATHINFO_EXTENSION);

	$nomeFinalFoto = $novoNomeimg . "." . $extRealfoto;

	//echo $nomeFinalFoto;

	$nome_temporario=$_FILES['foto']['tmp_name'];
	//echo $nome_temporario;

	

	$query = "INSERT into visitante (nome_visitante,rg_visitante, cpf_visitante, nascimento_visitante,sexo_visitante, senha_visistante, confsenha_visitante, foto_visitante) VALUES ('$nome', '$rg', '$cpf', '$nasc', '$sexo', '$pass', '$confpass', '$nomeFinalFoto')";
	
	$sql = mysqli_query($conn,$query);
	$n = mysqli_affected_rows($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Processar</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
	<?php
	require_once "includes/header.php";
	?>
	<div class="principal">
		<div class="container">
			<div class="titulo-principal">Processar dados de Cadastro</div>

			<form name="formulario" method="post" action="#">
				<fieldset id="identificacao" class="input-form">
					<legend>Identificação</legend>
					<div class="coluna coluna1">
						<label for="txtNome">Nome Completo: *</label>
						<input type="text" name="txtNome" id="txtNome" class="txtnome" value="<?php echo $nome?>" readonly>
					</div>
					<div class="colunas">
						<div class="coluna coluna3">
							<label for="txtRG">RG: *</label>
							<input type="text" name="txtRG" id="txtRG" class="tamanho" value="<?php echo $rg?>" readonly>
						</div>
						<div class="coluna coluna3 espace">
							<label for="txtCPF">CPF: *</label>
							<input type="text" name="txtCPF" id="txtCPF" class="tamanho" value="<?php echo $cpf?>" readonly>
						</div>
					</div>
					<div class="colunas">
						<div class="coluna coluna3">
							<label for="txtNasc">Data de Nascimento: *</label>
							<input type="date" name="txtNasc" id="txtNasc" class="tamanho" value="<?php echo $nasc?>" readonly>
						</div>
						<div class="coluna coluna3 espace">
							<label>Sexo: *</label>
							<?php
								if($sexo == "M"){?>
									<div class="teste">
									<input type="radio" name="rdoSexo" id="rdoSexoM" value="M" class="radio" readonly checked>
									<label for="rdoSexoM" class="rdoSexo">Masculino</label>
									</div>
							<?php } else{?>
								<div class="teste">
								<input type="radio" name="rdoSexo" id="rdoSexoM" value="M" class="radio"  readonly>
								<label for="rdoSexoM" class="rdoSexo">Masculino</label>
								</div>
							<?php } ?>
							<?php
								if($sexo == "F"){?>
									<div class="teste">
									<input type="radio" name="rdoSexo" id="rdoSexoF" value="F" class="radio" readonly checked>
									<label for="rdoSexoF" class="rdoSexo">Feminino</label>
									</div>
							<?php } else{?>
								<div class="teste">
								<input type="radio" name="rdoSexo" id="rdoSexoF" value="F" class="radio" readonly>
								<label for="rdoSexoF" class="rdoSexo">Feminino</label>
								</div>
							<?php } ?>
							<?php
								if($sexo == "O"){?>
									<div class="teste">
									<input type="radio" name="rdoSexo" id="rdoSexoO" value="O" class="radio" readonly checked>
									<label for="rdoSexoO" class="rdoSexo">Outros</label>
									</div>
							<?php } else{?>
								<div class="teste">
								<input type="radio" name="rdoSexo" id="rdoSexoO" value="O" class="radio" readonly>
								<label for="rdoSexoO" class="rdoSexo">Outros</label>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="colunas">
						<div class="coluna coluna3">
							<label for="txtPass">Senha: *</label>
							<input type="password" name="txtPass" id="txtPass" class="tamanho" value="<?php echo $pass?>" readonly>
						</div>
						<div class="coluna coluna3 espace">
							<label for="txtConfPass">Confirmação da Senha: *</label>
							<input type="password" name="txtConfPass" id="txtConfPass" class="tamanho" value="<?php echo $confpass?>" readonly>
						</div>
					</div>
				</fieldset>
				<fieldset id="fotografia" class="input-form">
					<legend>Fotografia</legend>
					<div class="coluna">
						<img src="img/<?php echo $nomeFinalFoto?>" alt="Usuário">
						<label class="botao" id="arquivo" for="filearquivo">Enviar arquivo</label>
						<input type="file" id="filearquivo">
					</div>
				</fieldset>
				<fieldset class="col-unica input-form">
					<legend>Endereço</legend>
					<div class="colunas">
						<div class="coluna coluna3">
							<label for="txtRua">Rua:</label>
							<input type="text" name="txtRua" id="txtRua" class="tamanho">
						</div>
						<div class="coluna coluna4 espace">
							<label for="txtNum">Número:</label>
							<input type="text" name="txtNum" id="txtNum" class="tamanho">
						</div>
						<div class="coluna coluna4 espace">
							<label for="txtCompl">Complemento:</label>
							<input type="text" name="txtCompl" id="txtCompl" class="tamanho">
						</div>
					</div>
					<div class="colunas">
						<div class="coluna coluna5">
							<label for="txtBairro">Bairro:</label>
							<input type="text" name="txtBairro" id="txtBairro" class="tamanho">
						</div>
						<div class="coluna coluna5 espace">
							<label for="txtCidade">Cidade:</label>
							<input type="text" name="txtCidade" id="txtCidade" class="tamanho">
						</div>
						<div class="coluna coluna5 espace">
							<label for="UF">Estado:</label>
							<select name="UF" id="UF" class="tamanho">
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
								<option value="EX">Estrangeiro</option>
								<option value="" selected>Selecione um Estado</option>
							</select>
						</div>
					</div>
				</fieldset>

				<fieldset class="input-form">
					<legend>Diversos</legend>
					<fieldset class="coluna5">
						<legend>Áreas de Interesse</legend>
						<div class="colunas espace">
							<div class="teste" style="margin-top:20px;margin-bottom:20px">
								<input type="checkbox" name="chkTec" id="chkTec" value="Tecno" class="radio">
								<label for="chkTec" class="rdoSexo">Tecnologia</label>
							</div>
							<div class="teste" style="margin-top:20px;margin-bottom:20px">
								<input type="checkbox" name="Esportes" id="Esportes" value="Esportes" class="radio">
								<label for="Esportes" class="rdoSexo">Esportes</label>
							</div>
							<div class="teste" style="margin-top:20px;margin-bottom:20px">
								<input type="checkbox" name="Outros" id="Outros" value="Outros" class="radio">
								<label for="Outros" class="rdoSexo">Outros</label>
							</div>
						</div>
					</fieldset>

					<fieldset class="coluna5 espace">
						<legend>Cor de Preferência</legend>
						<div class="colunas espace">
							<div class="teste" style="margin-top:20px;margin-bottom:20px">
								<input type="color" name="ColorPick" id="ColorPick">
							</div>
						</div>
					</fieldset>
				</fieldset>
				<button type="submit" class="sucess" disabled>Enviar</button>
				<button type="reset" class="btn-danger" disabled>Cancelar</button>

		</div>
	</div>

	<?php
	require_once "includes/footer.php";
	?>
</body>

</html>