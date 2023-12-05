<?php
	session_start();
	require_once "includes/conexao.php";
	if(isset($_SESSION['logado'])){
		$query = mysqli_query($conn, "select * from visitante");
?>
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
			<div class="titulo-principal">Usuários cadastrados</div>
			
			<?php
				while ($rs = mysqli_fetch_array($query)){
			?>
					<table>
						<tr>
							<td><?php echo $rs["nome_visitante"]; ?></td>
							<td><?php echo $rs["rg_visitante"]; ?></td>
							<td><?php echo $rs["cpf_visitante"]; ?></td>
							<td><?php echo $rs["sexo_visitante"]; ?></td>
						</tr>
					</table>
			<?php
				}
			?>

		</div>
	</div>
	<?php
	require_once "includes/footer.php";
	?>
</body>

</html>

<?php 
	}
	else{
		$_SESSION['logado']=false;
		$_SESSION['erro']=2;
		header("location:index.php");
	} 
?>