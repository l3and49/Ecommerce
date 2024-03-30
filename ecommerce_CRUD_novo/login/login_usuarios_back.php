<?php
    session_start();
    // script foi chamado de index.php
    include "../utils/conexao.php"; 

    $usuario = $_POST["email"];
    $senhacripto = MD5($_POST["senha"]);
    
    //$senha = md5($senha); //ou se a senha estiver oculta
    $sql = "select * from usuariosOrganizaMais where email = '$usuario' and senha = '$senhacripto' ";

    $res = pg_query($conecta, $sql);
    if (pg_num_rows($res) > 0)
    {
        $linha = pg_fetch_array($res);

        $_SESSION["usuariologado"] = $linha;
        $_SESSION["isadm"] = $linha['adm'];
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php'>";
    }
    else
    {
        echo '<script language="javascript">';
        echo "alert('Usuário ou senha inválidos!')";
        echo '</script>';	

        var_dump($sql);
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login_usuarios_front.html'>";
    }
?>