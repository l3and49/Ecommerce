<link rel="stylesheet" href="../css/cabecalho.css">
<iframe src="../utils/cabecalho.php" title="cabecalho" frameBorder="0" 
        width="100%" scrolling="no" allowfullscreen>
</iframe>

<!-- Recuperando as informações do produto -->
<?php
       $cod_produto = $_GET["cod_produto"];
       include "cad_getinfo_produto_back.php"; 
       
       ini_set('display_errors',1);
       ini_set('display_startup_erros',1);
       error_reporting(E_ALL);
?>

<!-- Formulário (após as informações serem carregadas) -->
<form action="cad_altera_produtos_back.php" method="post" enctype="multipart/form-data">>
    <h1>Alteração de Produtos</h1>
    Código do produto
    <input type="hidden" name="cod_produto" value="<?php echo $cod_produto; ?>">
    <br><br>Nome
    <input type="text" name="nome" 
           value="<?php echo $linha['nome']; ?>" >
    <br><br>Descrição
    <input type="text" name="descricao" 
           value="<?php echo $linha['descricao']; ?>" >
    <br><br>Preço
    <input type="text" name="preco" 
           value="<?php echo $linha['preco']; ?>" >
    <br><br>Codigo Visual
    <input type="text" name="codigoVisual" 
           value="<?php echo $linha['codigovisual']; ?>" >
    <br><br>Custo
    <input type="text" name="custo" 
           value="<?php echo $linha['custo']; ?>" >
           <br><br>lucro
    <input type="text" name="margemLucro" 
           value="<?php echo $linha['margemlucro']; ?>" >
           <br><br>icms
    <input type="text" name="icms" 
           value="<?php echo $linha['icms']; ?>" >
           <br><br>cod_cor
    <input type="text" name="cod_cor" 
           value="<?php echo $linha['cor']; ?>" >
           <br><br>Quantidade Produto
    <input type="text" name="qtdeProduto" 
           value="<?php echo $linha['qtdeproduto']; ?>" >
           <br><br>campoImagem
    <input type="file" accept="image/JPEG,image/PNG,image/JPG" name="campoImagem">

     <br><br>
    <input type="submit" value="Gravar">
    <input type="reset" value="Voltar" onclick="history.back()">
</form>