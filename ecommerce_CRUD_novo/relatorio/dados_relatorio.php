<?php
	require "conexao.php";

	// $sql = "select cod_usuario, nome,
   //          count(1) as qtde 
   //             from vendaorganizamais v
   //             inner join usuariosorganizamais u 
   //          on v.cod_usuario = u.cod_usuario 
   //          group by cod_usuario, nome
   //          order by qtde desc ";

   $sql = "select extract(day from datavenda) as diavenda,
               extract(month from datavenda) as mesvenda,
               count(1) as qtde
            from vendaorganizamais v
            group by diavenda,
               mesvenda
            order by mesvenda, diavenda
            ";


	$res = pg_query($conecta, $sql);
	$qtde=pg_num_rows($res);	 
?>