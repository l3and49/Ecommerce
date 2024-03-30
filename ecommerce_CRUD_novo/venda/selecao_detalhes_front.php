<link rel="stylesheet" href="../css/cabecalho.css">
<link rel="stylesheet" href="../css/selecaodetalhes.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;500&display=swap" rel="stylesheet">

<iframe src="../utils/cabecalho.php" title="cabecalho" frameBorder="0" 
        width="100%" scrolling="no" allowfullscreen>
</iframe>

<!-- Recuperando as informações do produto -->
<?php
       $cod_produto = $_GET["id"];
       include "../cadastros/cad_getinfo_produto_back.php"; 
?>

<div class="crack">
        <div class="corpo">
            <div class="container">

                <div class="imagem">
                    <?php
                        echo "<img src= 'data:image/jpeg;base64," .$linha['campoimagem']."' class='imgprod'/>"  
                    ?>
                </div>
                
                <div class="desc">
                    <h5 id="codprod">Código do produto: <?php echo $linha['cod_produto']; ?></h5>
        
                    <h1><?php echo $linha['nome']; ?></h1>
                    <br>
                    <h4>R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?> </h4>
                    <br><br>
                    <!-- <h5 id="qtdeestoq">Quantidade em estoque: <?php echo $linha['qtdeproduto']; ?></h5> -->
                    <br>
                    <span class="comprar"><a href='carrinho_front.php?acao=add&cod_produto=<?php echo $cod_produto; ?>'>Comprar</a></span>
                    
                    <?php
                    echo "<br><br>";
                        if ($linha['qtdeproduto']<=0)
                        {
                            echo "
                            <div><span id='qtdeestoq'>Esgotado</span></div>";
                        }
                        else
                        {
                            echo "
                            <div><span id='qtdeestoq'>Quantidade em estoque: ".$linha['qtdeproduto']."</span></div>";
                        }
                    ?>
       
                    
                    <br><br>
                    <div class="voltahome"><a href="selecao_produtos_front.php"><img src="../img/seta.png">Voltar</a></div>
                    <!-- <a href="selecao_produtos_front.php">Voltar</a> -->
                </div>
            </div>

        </div>
        <div class="descricaoprod">
            <div class="perna">
                <h5>Código visual: <?php echo $linha['codigovisual']; ?></h5>
                <br>
                <!-- <h5>Descrição: <?php echo $linha['descricao']; ?></h5> -->

                <?php
                    echo "
                    <div class='tituldesc'><span><p>Descrição: </p>".$linha['descricao']."</span></div>";
                ?>
                <br><br>
            </div>
        </div>
</div>

