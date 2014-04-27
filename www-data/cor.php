<?php
	include 'config.php';
	

	// Codigo para realizar o insert via POST
	if (isset($_POST["cor"])) {
		$novacor = $_POST["cor"];
	}
	
	if (isset($novacor)) {
		mysqli_query($db_con,"INSERT INTO cor (nome) VALUES ('".$novacor."')");
		$alert = "cor <strong>".$novacor."</strong> cadastrada.";
	}

	// Codigo para realizar a listagem das categorias
	$dbquery = mysqli_query($db_con, "SELECT * FROM cor");
	$numitems = mysqli_num_rows($dbquery);
 
?>

<html>
<head>
	<? include 'head.php'; ?>
		<title>Você Aluga - Manutenção de Cores</title>
</head>
<body>
	<?php include 'navbar.php'; ?>
	<?php
		if (isset($alert)) {
			echo "<div class='alert alert-success'>";
			echo $alert;
			echo "</div>";
		}
	?>
	


	<div class="page-header">
	<h1>Manutenção de Cores</h1>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Listagem de cores</h3>
				</div>
				<div class="panel-body">
					<ul>
						<?php
							if ($numitems == 0) {
								echo "<li>Nao existem cores cadastradas</li>";
							}
							else {
								while ( $listagem = mysqli_fetch_array($dbquery) ) {
									echo "<li>".$listagem['nome']."</li>";
								}
							
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Cadastrar Nova cor</h3>
				</div>
				<div class="panel-body">
					<p>Informe o nome da cor a ser cadastrada:</p>
					<form name="cadastro" action="cor.php" method="post">
						<input type="text" name="cor">
						<button type="submit" value="Cadastrar" class="btn btn-success">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
<?php
mysqli_close($db_con);
?>
</html>