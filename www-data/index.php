<html>
	<head>
		<? include 'head.php'; ?>
		<title>Você Aluga - Pagina Inicial</title>
	</head>
	<body>

	<?php include 'navbar.php'; ?>
	<div class="page-header">
	<h1>Escolha a opção desejada:</h1>
	</div>


	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Veiculos</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li><a href="consultavei.php">Consultar Veiculo</a></li>
						<li><a href="cadvei.php">Cadastrar Veiculo</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Manutenção do Sistema</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li><a href="categoria.php">Listar/Cadastrar Categorias</a></li>
						<li><a href="marca.php">Listar/Cadastrar Marcas</a></li>
						<li><a href="cor.php">Listar/Cadastrar Cores</a></li>
					</ul>
				</div>
		</div>
	</div>

	</body>
</html>