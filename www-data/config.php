<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'unopar';
$db_name = 'vocealuga';
$db_con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (mysqli_connect_errno($db_con)) {
	echo "Falha ao conectar ao banco de dados: " . mysqli_connect_error();
}


?>