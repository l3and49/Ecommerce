<link rel="stylesheet" href="../css/cabecalho.css">
<iframe src="../utils/cabecalho.html" title="cabecalho" frameBorder="0" 
        width="100%" scrolling="no" allowfullscreen>
</iframe>

<!-- Recuperando as informações do produto -->
<?php
       $cod_produto = $_GET["id"];
       include "../ecommerce_CRUD_novo/conexao.php"; 
?>

<div style="border: 1px solid black">

    <h1><?php echo $linha['nome']; ?></h1>
    <?php
    echo "<img src= 'data:image/jpeg;base64," .$linha['campoimagem']."'  style='width:150px; height:100px' />"  
    ?>
   
    <br><br>
    Código do produto:<?php echo $linha['cod_produto']; ?>
    <br><br>
    Descrição: <?php echo $linha['descricao']; ?>
    <br><br>
    Quantidade : <?php echo $linha['qtdeproduto']; ?>
    <br><br>
    Preço: R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?>
    <br><br>
    Código visual: <?php echo $linha['codigovisual']; ?>
    <br><br>
    <a href='carrinho_front.php?acao=add&cod_produto=<?php echo $cod_produto; ?>'>Comprar</a>
    &nbsp;<a href="./ecommerce_CRUD_novo/index.php">Voltar</a>
</div>

