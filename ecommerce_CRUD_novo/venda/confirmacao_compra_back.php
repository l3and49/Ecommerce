<?php
    include "../utils/conexao.php"; 

    /* seleciona todos os itens do carrinho do usuário */
    $sql="SELECT c.*,
                 p.preco,
                 p.nome,
                 c.qtde * p.preco as subtotal,
                 p.descricao,
                 p.qtdeproduto as estoque
            FROM carrinhoorganizamais c
           inner join produtosorganizamais p
              on c.cod_produto = p.cod_produto
           WHERE c.cod_usuario = $codusuario
           ORDER BY p.descricao;";

    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);

    $resultado_lista = null;

    if ($qtde > 0)
    {
        $resultado_lista=pg_fetch_all($resultado);
    }

    // Fecha a conexão com o PostgreSQL
    pg_close($conecta);

    session_start();
    $_SESSION['produtosorganizamais'] = $resultado_lista;
?>