<?php
    include "../ecommerce_CRUD_novo/utils/conexao.php"; 

    $sql="SELECT * FROM produtosOrganizaMais WHERE excluido='false' and qtdeproduto > 0 ORDER BY descricao  limit 4;";
    
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);

    $resultado_lista = null;

    if ($qtde > 0)
    {
        $resultado_lista=pg_fetch_all($resultado);
    }
 
    pg_close($conecta);
?>