<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<link rel="stylesheet" href="../css/cabecalho.css">
<link rel="stylesheet" href="../css/styleprincipal.css">

<body>
    <?php
        session_start();
    ?>
    <?php
        // Usuário é um ADM???
        //if (isset($_SESSION['isadm']) && $_SESSION['isadm'] == 't')
        //    echo "<a href='../cadastros/cad_pesq_produtos_front.php' target='_parent'>Cad. Produtos</a>&nbsp;|&nbsp;";
    ?>

    <div class="inicio-container">
        <a href="../index.php" target="_parent"><img src="../img/lgorganizamais.svg" class="logotipo"></a>
        <div class="espace-inicio"></div>
        <form action="../venda/selecao_produtos_front.php" method="GET" id="frmpesq" name="frmpesq" target="_parent">
            <div class="search">
                <input type="searchbar" value="" placeholder="organizador" name="src">
                <a class="icon" onclick="document.getElementById('frmpesq').submit()">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </form>
        <a href="../venda/carrinho_front.php" target="_parent"><img src="../img/sacola_icon.png" height="50px"></a>
        <a href="../login/login_usuarios_front.html" target="_parent"><img src="../img/perfil_icon.png" height="50px"></a>
    </div> <!-- inicio-container -->
    
    <div class="barra-cabecalho">
        <a href="../index.php" target="_parent">HOME</a>
        <a href="../venda/selecao_produtos_front.php" target="_parent">PRODUTOS</a>
        <a href="../cadastros/devs.php" target="_parent">SOBRE & DEV'S</a>
        <a href="../relatorio/relatorio_pdf.php"  target="_blank">Relatório</a>

        <?php
        // Usuário é um ADM???
        if (isset($_SESSION['isadm']) && $_SESSION['isadm'] == 't')
        {
        //    echo "<a href='../cadastros/cad_pesq_produtos_front.php' target='_parent'>Cad. Produtos</a>&nbsp;|&nbsp;";
        ?>
            <a href="../cadastros/pesqprodutos_front.php" target="_parent">CAD. PRODUTOS</a>
            <a href="../login/login_usuarios_front.html" target="_parent">CAD. USUÁRIO</a>
        <?php
        }
        ?>
        



        
        <?php
        //    echo "<img src='../img/login.png' width='10px'></img>&nbsp;";

            // Usuário está logado???
            if (isset($_SESSION['usuariologado']))
            {
                echo "<a href='../login/logoff_back.php' target='_parent'>";
                echo "⍇ Usuário: ";
                echo $_SESSION['usuariologado']['nome'];
            }
            else
            {
                //echo "<a href='../login/login_front.php' width='30px' target='_parent'>Login</a>";
            }
        ?> 
        
    </div> <!-- barra-cabecalho -->
</body>
