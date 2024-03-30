<?php
    include "../utils/conexao.php"; 

    //dados enviados do script altera_prod_lista.php
    #var_dump($_POST);
    $cod_produto=$_POST['cod_produto'];
    $nome=$_POST['nome'];
    $descricao=$_POST['descricao'];
    $preco=$_POST['preco'];
    $codigoVisual=$_POST['codigoVisual'];
    $custo=$_POST['custo'];
    $margemLucro=$_POST['margemLucro'];
    $icms=$_POST['icms'];
    $cod_cor=$_POST['cod_cor'];
    $qtdeProduto=$_POST['qtdeProduto'];
    $pathImage = $_FILES['campoImagem']['tmp_name'];
    $imagedata = file_get_contents($pathImage);
    $campoimagem = base64_encode($imagedata); 

    $sql="UPDATE produtosOrganizaMais
            SET nome = '$nome',
                descricao = '$descricao',
                preco = $preco,
                codigovisual = '$codigoVisual',
                custo = '$custo',
                margemlucro = '$margemLucro',
                icms = $icms,
                cor = $cod_cor,
                qtdeproduto = $qtdeProduto,
                campoimagem = '$campoimagem'
            WHERE cod_produto = $cod_produto;";
           
    
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);

    if ($qtde > 0)
        echo "<script type='text/javascript'>alert('Gravação OK !!!')</script>";
    else	
        echo "<script type='text/javascript'>alert('Erro na Gravação !!!')</script>";

    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=pesqprodutos_front.php'>";

    // Fechando conexão com o Banco de Dados
    pg_close($conecta);
?>