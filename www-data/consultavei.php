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

	$dbqueryveiculo = mysqli_query($db_con, "SELECT * FROM carro WHERE marca='".$marca."' AND cor='".$cor."' AND categoria='".$categoria."'");
	$numitems = mysqli_num_rows($dbqueryveiculo);
	$dbquerymarca = mysqli_query($db_con, "SELECT nome FROM marca");
	$dbquerycor = mysqli_query($db_con, "SELECT nome FROM cor");
	$dbquerycategoria = mysqli_query($db_con, "SELECT nome FROM categoria");
	
 
?>

<html>
<head>
	<? include 'head.php'; ?>
		<title>Você Aluga - Consulta de Veículos</title>
</head>
<body>
	<?php include 'navbar.php'; ?>
	
	<div class="page-header">
	<h1>Consulta de Veiculos</h1>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Consultar Veículos</h3>
				</div>
				<div class="panel-body">
					<p>Informe dados do veículo a ser consultado:</p>
					<form name="consulta" action="consultavei.php" method="post">
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
						<button type="submit" value="Pesquisar" class="btn btn-success">Pesquisar</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Resultado da consulta</h3>
				</div>
				<div class="panel-body">
					<?php
						if ($numitems == 0) {
							echo "<p>Não existem veiculos a serem exibidos com essa busca.";
						}
						else {
							while ( $listagem = mysqli_fetch_array($dbqueryveiculo) ) {
								echo "<ul class='list-group'>";
            					echo "<li class='list-group-item active'><strong>".$listagem['nome']."</strong></li>";
            					echo "<li class='list-group-item'>Marca: ".$listagem['marca']."</li>";
            					echo "<li class='list-group-item'>Categoria: ".$listagem['categoria']."</li>";
            					echo "<li class='list-group-item'>Cor: ".$listagem['cor']."</li>";
            					echo "<li class='list-group-item'>Descricao: ".$listagem['descricao']."</li>";
          						echo "</ul>";
          						echo "<br><br>";
							}
						}
					?>
					
				</div>
			</div>
		</div>
	</div>

</body>
<?php
mysqli_close($db_con);
?>
</html>