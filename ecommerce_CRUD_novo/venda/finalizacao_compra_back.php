<?php
    include "../utils/conexao.php"; 

    $compraFinalizada = FALSE;

    function validarProdutos($resultado_lista)
    {


        foreach($resultado_lista as $linha)
        {
            $sql = "SELECT qtdeproduto FROM produtosorganizamais ";
             $res = pg_query($conecta,$sql);
             if ($res == 0)
               return false;
        }

        return true;
    }

    function atualizarEstoque($conecta, $codproduto, $qtdeVendida)
    {
        $sql = "UPDATE produtosorganizamais 
            SET qtdeproduto = qtdeproduto - $qtdeVendida 
            WHERE cod_produto = $codproduto; ";
        $res = pg_query($conecta,$sql);
    }

    session_start();
    $resultado_lista = $_SESSION['produtosorganizamais'];

    // (ainda precisa programar)
    validarProdutos($resultado_lista);

    $sql = "INSERT INTO vendaorganizamais (cod_venda, cod_usuario, datavenda, excluido) VALUES (DEFAULT, $codusuario, NOW(),'f');";
    $res = pg_query($conecta, $sql);
    $qtdLinhas = pg_affected_rows($res);

    if ($qtdLinhas == 0)
        echo "<h1>Erro ao Finalizar a Compra!!!</h1>";

    foreach($resultado_lista as $linha)
    { 
        $preco = $linha['preco'];
        $qtde = $linha['qtde'];
        $codproduto = $linha['cod_produto'];
        

        $sql = "INSERT INTO itensvendaorganizamais (cod_venda, cod_produto, qtde, preco) VALUES (CURRVAL('vendaorganizamais_cod_venda_seq'),".$codproduto.",".$qtde.",".$preco.");";
        $res = pg_query($conecta, $sql);

        atualizarEstoque($conecta, $codproduto, $qtde);
    }  

    $sql=" DELETE FROM carrinhoorganizamais
            where cod_usuario = $codusuario";

    pg_query($conecta,$sql);
    pg_close($conecta);


?>