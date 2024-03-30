<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Pesquisa de Produtos</title>
        <link rel="stylesheet" href="../css/cabecalho.css">
        <link rel="stylesheet" href="../css/style-pesqprodutos.css">
    </head>
<body>

<iframe src="../utils/cabecalho.php" title="cabecalho" frameBorder="0" 
    width="100%" height="110px" scrolling="no" allowfullscreen>
</iframe>

<div class="btn-novo">
    <a href='cad_novo_produtos_front.php'>Novo Produto +</a><br><br>
</div>

<div class="paosirio">
<?php
    include "pesqprodutos_back.php";

    if ($qtde == 0) {
        echo "Não foi encontrado nenhum produto!!!<br><br>";
        return;
    }

    // Começar tabela e criar o cabeçalho
    echo "
    <div class='table'>
        <div class='row'>
            <div class='cell cellCodigo cellHeader'>
                Cód. Produto
            </div>
            <div class='cell cellNome cellHeader'>
                Nome do produto
            </div>
            <div class='cell cellDescricao cellHeader'>
                Descrição
            </div>
            <div class='cell cellPrecoproduto cellHeader'>
                Preço
            </div>
            <div class='cell cellExcluido cellHeader'>
                Excluido
            </div>
            <div class='cell cellCodigovisual cellHeader'>
                Código Visual
            </div>
            <div class='cell cellCusto cellHeader'>
                Custo
            </div>
            <div class='cell cellMargemlucro cellHeader'>
                Margem de lucro
            </div>
            <div class='cell cellicms cellHeader'>
                ICMS
            </div>
            <div class='cell cellCodcor cellHeader'>
                Cód. Cor
            </div>
            <div class='cell cellQtdeproduto cellHeader'>
                Qtde. produtos
            </div>
            <div class='cell cellMarcaproduto cellHeader'>
                Marca
            </div>

            <div class='cell cellAcoes'>
                &nbsp;
            </div>
        </div>";

        // Criar linhas com os dados dos produtos
        foreach ($resultado_lista as $linha)
        {
            echo "
            <div class='row'>
                <div class='cell cellCodigo'>
                    ".$linha['cod_produto']."
                </div>
                <div class='cell cellNome'>
                    ".$linha['nome']."
                </div>
                <div class='cell cellDescricao'> 
                    ".$linha['descricao']."
                </div>
                <div class='cell cellPrecoproduto'>
                    ".$linha['preco']."
                </div>
                <div class='cell cellExcluido'>
                    ".$linha['excluido']."
                </div>
                <div class='cell cellCodigovisual'>
                    ".$linha['codigovisual']."
                </div>
                <div class='cell cellCusto'>
                    ".$linha['custo']."
                </div>
                <div class='cell cellMargemlucro'>
                    ".$linha['margemlucro']."
                </div>
                <div class='cell cellicms'>
                    ".$linha['icms']."
                </div>
                
                <div class='cell cellCodcor'>
                    ".$linha['cor']."
                </div>
                <div class='cell cellQtdeproduto'>
                    ".$linha['qtdeproduto']."
                </div>   
                <div class='cell cellMarcaproduto'>
                    ".$linha['marca']."
                </div>  

                <div class='cell cellAcoes'>
                    <a href='cad_altera_produtos_front.php?cod_produto=".$linha['cod_produto']."'> Alterar</a>&nbsp;
                    <a href='cad_exclui_produtos_front.php?cod_produto=".$linha['cod_produto']."'> Excluir</a>&nbsp;
                </div>
            </div> "; 
        } 
    // Fechando a tag da tabela
    echo "</div>";
?>   
</div> 
</body>
</html>