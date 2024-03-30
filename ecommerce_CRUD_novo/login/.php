<?php
    session_start();
    // script foi chamado de index.php
    include "../utils/conexao.php"; 

    $usuario = $_POST["usuario"];
    $senhacripto = MD5($_POST["senha"]);
    
    //$senha = md5($senha); //ou se a senha estiver oculta
    $sql = "select * from usuarios where usuario = '$usuario' and senha = '$senhacripto' ";

    $res = pg_query($conecta, $sql);
    if (pg_num_rows($res) > 0)
    {
        $linha = pg_fetch_array($res);

        $_SESSION["usuariologado"] = $linha;
        $_SESSION["isadm"] = $linha['adm'];
        //echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php'>";
    }
    else
    {
        echo '<script language="javascript">';
        echo "alert('Usuário ou senha inválidos!')";
        echo '</script>';	

        echo var_dump($sql);
        //echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login_front.php'>";
    }
?>