<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Carrinho de compras</title>
        <link rel="shortcut icon" type="imagex/png" href="../ecommerce_CRUD_novo/img/pote.png">
        <link rel="stylesheet" href="../css/cabecalho.css">
        <link rel="stylesheet" href="../css/style-selecao.css">
        <link rel="stylesheet" href="../ecommerce_CRUD_novo/css/styleprincipal.css">
    </head>
<body>
    <a name="Topo"></a>
    <iframe src="../utils/cabecalho.php" title="cabecalho" frameBorder="0" 
        width="100%" scrolling="no" allowfullscreen>
    </iframe>

    <div class="main">
        <div class="containerfiltro">
            <h3>PRODUTOS</h3>
            
            <form action="../venda/selecao_produtos_front.php" method="GET" id="frmfilt" name="frmfilt" target="_parent">
                <div class="box">
                    <h4>Ordenar por</h4>
                    <!-- <a onclick="document.getElementById('frmfilt').submit()">Menor preço</a> -->
                    <a href="?ordem=menorp">Menor preço</a>
                    <br>
                    <a href="?ordem=maiorp">Maior preço</a>
                </div>
                <div class="linebox"></div>
                <div class="box">
                    <h4>Marca</h4>
                    <a href="?marca=plasutil"><p>Plasutil</p></a>
                    <a href="?marca=topline"><p>TopLine</p></a>
                </div>
                <div class="linebox"></div>
                <div class="box">
                    <h4>Cores</h4>
                    <a href="?cor=vermelho"><p>Vermelho</p></a>
                    <a href="?cor=branco"><p>Branco</p></a>
                    <a href="?cor=preto"><p>Preto</p></a>
                    <a href="?cor=cinza"><p>Cinza</p></a>
                    <a href="?cor=azul"><p>Azul</p></a>
                </div>
            </form>
            
        </div>

        <div class="container-geral-prod">
            <?php
                $src = $_GET["src"] ?? '';
                $ordem = $_GET["ordem"] ?? '';
                $marca = $_GET["marca"] ?? '';
                $cor = $_GET["cor"] ?? '';
                include "selecao_produtos_back.php";

                if ($qtde == 0) {
                    echo "Não foi encontrado nenhum produto!!!<br><br>";
                    return;
                }

                echo '<div style="display:grid; 
                                grid-template-columns: repeat(4,250px); 
                                grid-column-gap: 10px;
                                grid-row-gap: 10px;
                                width=1250px">';

                // Criar linhas com os dados dos produtos
                foreach ($resultado_lista as $linha)
                {
                    $preco= number_format($linha['preco'], 2, ',', '.');
                    //var_dump($linha);

                    echo "
                    <div class='container-prod'>
                        <div class='img-prod'>
                            <br>
                            <a href='selecao_detalhes_front.php?id=".$linha['cod_produto']."'>
                                <img src= 'data:image/jpeg;base64," .$linha['campoimagem']."' class='campoimg'/>
                            </a>
                        </div>
                        
                        <div class='desc-prod'>
                            <div id='nome'><p>".$linha['nome']."</p></div>";
                            echo "<div id='preco'> R$".$linha['preco']."</div>";
                            
                            echo "<div class='container-pq'>";
                                echo "<a href='carrinho_front.php?acao=add&cod_produto=".$linha['cod_produto']."&estoque=".$linha['qtdeproduto']."'><button id='btncompra'>Comprar</button></a>";

                                if ($linha['qtdeproduto']<=0)
                                {
                                    echo "
                                    <div><span id='qtdeprodesg'>☒ Esgotado</span></div>";
                                }
                                else
                                {
                                    echo "
                                    <div><span id='qtdeprod'>☑ ".$linha['qtdeproduto']." em estoque</span></div>";
                                }
                                echo "<br>";
                            echo "</div>";

                        echo "</div><br>";
                    echo "</div>";

                }

                echo "</div>";

            ?>
        </div>
    
    
        
        </div>
        <div>
        <div class="sobre-informacoes-container">
                <a href="#Topo"><img src="../img/volta-topo-btn.png" id="btn-voltopo"></a>
                <h3>DESENVOLVIMENTO</h3>
                <p>Isaque 09 • Leandro 11 • Vinicius 22 • Allan 02</p>
                <br>
                <div class="linha-sobre-informacoes"></div>
                <br>
                <div class="logos-container">
                    <div class="sobre-inf-parceria">
                        <h3>PARCERIA</h3>
                        <br>
                        <a href="https://www.lojaplasutil.com.br/" target="_blank">
                            <img src="../img/sobre-info-img/logo_plasutil.png"></a>
                        &nbsp;
                        <a href="https://toplineud.com.br/" target="_blank">
                            <img src="../img/sobre-info-img/logo_topline.png"></a>
                    </div>
                    <div class="sobre-inf-formapag">
                        <h3>FORMAS DE PAGAMENTO</h3>
                        <br>
                        <img src="../img/sobre-info-img/elo_logo.png">
                        <img src="../img/sobre-info-img/master_logo.png">
                        <img src="../img/sobre-info-img/pix_logo.png">
                        <img src="../img/sobre-info-img/visa_logo.png">
                        <img src="../img/sobre-info-img/boleto_logo.png">
                    </div>
                </div>
                <br>
                <p>
                    © 2021-2022 Site.com | SAC : +55 (14) 9999-9999 <br>
                    Av. Nações Unidas, 58-50 - Nucleo Res. Pres. Geisel, Bauru - SP, 17033-260
                </p>
            </div> <!-- sobre-informacoes-container -->
        </div>
    
    
 
</body>
 
</html>