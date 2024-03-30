<?php
    include "../utils/conexao.php"; 

    $sql="SELECT * FROM produtosOrganizaMais WHERE excluido='false' and qtdeproduto > 0 ";


    if (isset($src))
    {
        $src = strtoupper($src);
        $sql=$sql." and upper(nome) LIKE '%$src%'";
    }

    if (isset($marca))
    {
        if ($marca == 'plasutil')
            $sql = $sql." AND marca ='Plasutil' ";
        else if ($marca == 'topline')
            $sql = $sql." AND marca ='Top Line' ";
    }

    if (isset($cor))
    {
        if ($cor == 'vermelho')
            $sql = $sql." AND cor =  '3'";
        else if ($cor == 'branco')
            $sql = $sql." AND cor =  '2'";
        else if ($cor == 'preto')
            $sql = $sql." AND cor =  '1'";
        else if ($cor == 'cinza')
            $sql = $sql." AND cor =  '5'";
        else if ($cor == 'azul')
            $sql = $sql." AND cor =  '4'";

    }

    if (isset($ordem))
    {
        if ($ordem == 'menorp')
            $sql = $sql." ORDER BY preco ASC ;";
        else if ($ordem == 'maiorp')
            $sql= $sql." ORDER BY preco DESC ;";
    }
    else
    {
        $sql = $sql." ORDER BY nome;";
    }

    
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);

    $resultado_lista = null;

    if ($qtde > 0)
    {
        $resultado_lista=pg_fetch_all($resultado);
    }
 
    pg_close($conecta);
?>