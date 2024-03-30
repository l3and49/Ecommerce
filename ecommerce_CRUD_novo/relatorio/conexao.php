<?php

	$stringdeconexao = "host=pgsql.projetoscti.com.br
	port=5432
	dbname=projetoscti
	user=projetoscti
	password=gaspar";

	$conecta = pg_connect($stringdeconexao);
	
	if (!$conecta)
	{
		echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
		exit;
	}
?>
