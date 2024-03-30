<?php
    include "../utils/conexao.php"; 
    
    // Recuperação de dados
    $nomeUsuario=$_POST['nome'];
    $email=$_POST['email'];
    $senha=md5($_POST['senha']);
    $telefone=$_POST['telefone'];
    
    // Inserção
    $sql="INSERT INTO usuariosOrganizaMais
          (nome, email, senha, telefone, adm)
          VALUES (
            '$nomeUsuario', 
            '$email', 
            '$senha',
            '$telefone',
            false
            );";
    
    // Execução
    
    $resultado=pg_query($conecta,$sql);
    $linhas=pg_affected_rows($resultado);

    if ($linhas > 0)
    {
        echo '<script language="javascript">';
        echo "alert('Usuario salvo com sucesso!')";
        echo '</script>';	

        header("Location: cad_usuarios_front.html");
    }   
    else
    {
        echo '<script language="javascript">';
        echo "alert('Erro na gravação do usuario!')";
        echo '</script>';	
        echo $sql;
    }
    // Fecha a conexão com o PostgreSQL
    pg_close($conecta);
?>  