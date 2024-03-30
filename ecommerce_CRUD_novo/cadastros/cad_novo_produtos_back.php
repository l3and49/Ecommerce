<?php
    include "../utils/conexao.php"; 
    
    // Recuperação de dados
    $nomeProduto=$_POST['nome'];
    $descricao=$_POST['descricao'];
    $precoProduto=$_POST['preco'];
    $codigoVisual=$_POST['codigoVisual'];
    $custo=$_POST['custo'];
    $margemLucro=$_POST['margemLucro'];
    $icms=$_POST['icms'];
    $cod_cor=$_POST['cod_cor'];
    $qtdeProduto=$_POST['qtdeProduto'];
    $Marca=$_POST['marca'];
    $pathImage = $_FILES['campoImagem']['tmp_name'];
    $imagedata = file_get_contents($pathImage);
    $campoimagem = base64_encode($imagedata);

    //echo "<br><br>";
    //var_dump($_FILES['campoImagem']);
    
    // Inserção
    //insert into produtosOrganizaMais values (DEFAULT,'nome','jfnqwofjon',20,true,'6222-02-26',20, 20, 20,20, '20.png', 3, 5 );
    //INSERT INTO produtosDefault VALUES (DEFAULT,'Camiseta','É uma camisa',25.60,'false',NULL,'abcd'    ,10.5,5.33,20.50,'qlqer coisa',1,1,10)
    $sql="INSERT INTO produtosOrganizaMais
          (nome, descricao, preco, excluido,
          codigoVisual, custo, margemLucro, icms, 
          cor, qtdeProduto, campoImagem, marca)
          VALUES (
            '$nomeProduto', 
            '$descricao', 
            $precoProduto,
            '0',
            '$codigoVisual',
            $custo,
            $margemLucro,
            $icms,
            
            $cod_cor,
            $qtdeProduto,
            '$campoimagem',
            '$Marca'
            );";

    
    // Execução
    $resultado=pg_query($conecta,$sql);
    $linhas=pg_affected_rows($resultado);

    if ($linhas > 0)
    {
        echo '<script language="javascript">';
        echo "alert('Produto salvo com sucesso!')";
        echo '</script>';	

        header("Location: cad_novo_produtos_front.php");
    }   
    else
    {
        echo '<script language="javascript">';
        echo "alert('Erro na gravação do produto!')";
        echo '</script>';	
        header("Location: cad_novo_produtos_front.php");
    }
    // echo $sql;
    // Fecha a conexão com o PostgreSQL
    pg_close($conecta); 
?>  