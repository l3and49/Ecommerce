<?php
    include "../utils/conexao.php"; 

    // Verifica se o produto já está no carrinho
    function getQtdeProdutoCarrinho($conecta, $codusuario, $codproduto) {

        /* seleciona o carrinho */
        $sql="SELECT qtde
                FROM carrinhoOrganizaMais
               WHERE cod_usuario = $codusuario
                 AND cod_produto = $codproduto";
        echo $sql;
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_num_rows($resultado);

        if ( $qtde == 0 )
            return 0;
        
        // retornará a quantidade atual do item já existente no carrinho
        $produto_carrinho = pg_fetch_array($resultado);
        return intval($produto_carrinho['qtde']);
    }

    function addCarrinho($conecta, $codusuario, $codproduto, $estoque) {

        $qtdeProduto = getQtdeProdutoCarrinho($conecta, $codusuario, $codproduto);

        // Se o produto ainda não existe no carrinho
        if ($qtdeProduto == 0) {
            // Insere o produto
            $sql="INSERT INTO carrinhoOrganizaMais 
                (cod_carrinho,cod_produto, cod_usuario, qtde)   VALUES 
                (DEFAULT,$codproduto, $codusuario, 1);";
        }
        else if ($qtdeProduto > $estoque)
        {
            $sql="UPDATE carrinhoOrganizaMais
                     set qtde = $estoque
                   where cod_produto = $codproduto
                     and cod_usuario = $codusuario";
        }
        else {
            $sql="UPDATE carrinhoOrganizaMais
                     set qtde = ".($qtdeProduto + 1).
                  " where cod_produto = $codproduto
                     and cod_usuario = $codusuario";
        }

        // Execução
        pg_query($conecta,$sql);
    }

    function removeCarrinho($conecta, $codusuario, $codproduto) {
        $sql="DELETE FROM carrinhoOrganizaMais
               where cod_produto = $codproduto
                 and cod_usuario = $codusuario";

        // Execução
        pg_query($conecta,$sql);
    }

    function removeCarrinhoSemLogin($conecta) {
        $sql="DELETE FROM carrinhoOrganizaMais";

        pg_query($conecta,$sql);
    }

    function updateCarrinho($conecta, $codusuario, $prods) {

        //var_dump($prods);


        foreach($prods as $codproduto => $qtd){

            /* seleciona o carrinho */
            $sql="SELECT qtdeproduto FROM produtosOrganizaMais WHERE cod_produto = $codproduto;";
            
            $resultado=pg_query($conecta,$sql);
            // retornará a quantidade atual do item já existente no carrinho
            $linha = pg_fetch_array($resultado);
            $estoque = $linha['qtdeproduto'];

            
             if ($qtd > $estoque)
             {
                $sql="UPDATE carrinhoOrganizaMais
                         set qtde = $estoque
                       where cod_produto = $codproduto
                         and cod_usuario = $codusuario;";
            }
            else if ($qtd <= 0)
            {
                $sql="UPDATE carrinhoOrganizaMais
                         set qtde = 1
                       where cod_produto = $codproduto
                         and cod_usuario = $codusuario;";
            }
            else {
                $sql="UPDATE carrinhoOrganizaMais
                        set qtde = $qtd
                    where cod_produto = $codproduto
                        and cod_usuario = $codusuario;";

            }

            pg_query($conecta,$sql);
        }
    }
    

    // Início do processamento

    if (!empty($acao))
    {
        if ($acao == 'add') {
            addCarrinho($conecta, $codusuario, $codproduto, $estoque);
        }
        else if($acao == 'del'){
            removeCarrinho($conecta, $codusuario, $codproduto);
        }
        else if($acao == 'up'){
            updateCarrinho($conecta, $codusuario, $prods, $estoque);
        }

        // Modifica a url para remover qualquer uma das ações: add, del ou up, evita que a ação seja
        // processada novamente caso a página seja recarregada
        header("location:carrinho_front.php");
        return;
    }
    if ($_SESSION['usuariologado'] == false)
    {
        removeCarrinhoSemLogin($conecta);
    }

    
    /* seleciona todos os itens do carrinho do usuário */
    $sql="SELECT c.*,
                 p.preco,
                 p.nome,
                 c.qtde * p.preco as subtotal,
                 p.descricao,
                 p.qtdeproduto as estoque,
                 p.campoImagem
            FROM carrinhoOrganizaMais c
           inner join produtosOrganizaMais p
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
?>