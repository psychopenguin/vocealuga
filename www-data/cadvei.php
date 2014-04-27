<?php
	include 'config.php';
 
	if (isset($_POST["marca"])) {
		$marca = $_POST["marca"];
	}
	if (isset($_POST["cor"])) {
		$cor = $_POST["cor"];
	}
	if (isset($_POST["categoria"])) {
		$categoria = $_POST["categoria"];
	}
	if (isset($_POST["nome"])) {
		$nome = $_POST["nome"];
	}
	if (isset($_POST["descricao"])) {
		$descricao = $_POST["descricao"];
	}


	if (isset($marca) and isset($cor) and isset($categoria) and isset($nome) and isset($descricao)) {
		mysqli_query($db_con,"INSERT INTO carro (marca, cor, categoria, nome, descricao) VALUES ('".$marca."', '".$cor."', '".$categoria."', '".$nome."', '".$descricao."')");
		$alert = "Veiculo <strong>".$nome."</strong> cadastrado.";
	}

	$dbquerymarca = mysqli_query($db_con, "SELECT nome FROM marca");
	$dbquerycor = mysqli_query($db_con, "SELECT nome FROM cor");
	$dbquerycategoria = mysqli_query($db_con, "SELECT nome FROM categoria");
	$dbqueryveiculos = mysqli_query($db_con, "SELECT * FROM carro");
	$numitems = mysqli_num_rows($dbqueryveiculos);
	
 
?>

<html>
<head>
	<? include 'head.php'; ?>
		<title>Você Aluga - Cadastro de Veículos</title>
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
	<h1>Cadastro de Veiculos</h1>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Listagem de Veiculos</h3>
				</div>
				<div class="panel-body">
					<ul>
						<?php
							if ($numitems == 0) {
								echo "<li>Nao existem veiculos cadastrados</li>";
							}
							else {
								while ( $listagem = mysqli_fetch_array($dbqueryveiculos) ) {
									echo "<li>".$listagem['nome']."</li>";
								}
							
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Cadastrar Novo Veículo</h3>
				</div>
				<div class="panel-body">
					<p>Informe dados do veículo a ser cadastrado:</p>
					<form name="cadastro" action="cadvei.php" method="post">
						Marca:
						<select name="marca">
							<?php
								while ( $marca = mysqli_fetch_array($dbquerymarca) ) {
									echo "<option value='".$marca['nome']."'>".$marca['nome']."</option>";
								}
							?>
						</select>
						Cor:
						<select name="cor">
							<?php
								while ( $cor = mysqli_fetch_array($dbquerycor) ) {
									echo "<option value='".$cor['nome']."'>".$cor['nome']."</option>";
								}
							?>
						</select>
						Categoria:
						<select name="categoria">
							<?php
								while ( $categoria = mysqli_fetch_array($dbquerycategoria) ) {
									echo "<option value='".$categoria['nome']."'>".$categoria['nome']."</option>";
								}
							?>
						</select>
						<br>
						Nome: <input type="text" name="nome">
						<br>
						Descrição: <input type="textarea" name="descricao" size="80">
						<br>
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