<link rel="stylesheet" href="../css/cabecalho.css">
<link rel="stylesheet" href="../css/finalizacao.css">

<iframe src="../utils/cabecalho.php" title="cabecalho" frameBorder="0" 
        width="100%" scrolling="no" allowfullscreen>
</iframe>

<div class="corpo">
    <div class="container">
        <?php
            session_start();
            $codusuario = $_SESSION ['usuariologado']['codusuario'] ?? 0;
            $email = $_SESSION ['usuariologado']['email'] ?? 0;
            
            include "finalizacao_compra_back.php";
            
            echo "<h1>Compra finalizada!</h1>";
            include "../email/enviaking.php";
        ?>
        <br><br>
        <img src="../img/cheked.png">
        <br><br>
        <a href="selecao_produtos_front.php">Voltar</a>
    </div>
</div>
