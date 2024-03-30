<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organiza+ | Principal</title>
    <link rel="shortcut icon" type="imagex/png" href="../ecommerce_CRUD_novo/img/pote.png">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
    <a name="Topo"></a>
    <div class="main">
        
        <iframe src="./utils/cabecalho.php" title="cabecalho" frameBorder="0" 
            width="100%" height="100px" scrolling="no" allowfullscreen>
        </iframe>

        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
    
                <div class="slide first">
                    <img src="../ecommerce_CRUD_novo/img/img-slide/img_1.jpg" alt="Imagem 1">
                </div>
                <div class="slide">
                    <img src="../ecommerce_CRUD_novo/img/img-slide/img_2.jpg" alt="Imagem 2">
                </div>
                <div class="slide">
                    <img src="../ecommerce_CRUD_novo/img/img-slide/img_3.jpg" alt="Imagem 3">
                </div>
                <div class="slide">
                    <img src="../ecommerce_CRUD_novo/img/img-slide/img_4.jpg" alt="Imagem 4">
                </div>
    
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>
            <div class="manual-navigation">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
        <script src="script.js"></script>
        <!-- slider -->
    
        <div class="titulo-inicial">
            <p>PRODUTOS</p>
        </div> <!-- titulo-inicial -->
    
        <div class="container-geral-prod">
            <?php 
            //include "../ecommerce_CRUD_novo/venda/selecao_produtos_back.php";
            include "./home/selecao_produtos_home.php";

            if ($qtde == 0) {
                echo "Não foi encontrado nenhum produto !!!<br><br>";
                return;
            }

            echo '<div style="display:grid; 
                            grid-template-columns: repeat(4,270px); 
                            grid-column-gap: 10px;
                            grid-row-gap: 10px;
                            width=1250px">';

            // Criar linhas com os dados dos produtos
            if ($resultado_lista)
            foreach ($resultado_lista as $linha)
            {
                $preco= number_format($linha['preco'], 2, ',', '.');
                //var_dump($linha);

                echo "
                    <div class='container-prod'>
                        <div class='img-prod'>
                            <br>
                            <img src= 'data:image/jpeg;base64," .$linha['campoimagem']."' class='campoimg'/>
                        </div>
                        
                        <div class='desc-prod'>
                            <div id='nome'><p>".$linha['nome']."</p></div>";
                            echo "<div id='preco'> R$".$linha['preco']."</div>";
                            
                            echo "<div class='container-pq'>";
                                echo "<a a href='venda/selecao_produtos_front.php?acao=add&cod_produto=".$linha['cod_produto']."'><button id='btncompra'>Comprar</button></a>";

                                if ($linha['qtdeproduto']<=0)
                                {
                                    echo "
                                    <div><span id='qtdeprodesg'>☒ Esgotado</span></div>";
                                }
                                else
                                {
                                    echo "
                                    <div><span id='qtdeprod'>☑ ".$linha['qtdeproduto']." em estoque</span></div>";
                                }
                                echo "<br>";
                            echo "</div>";

                        echo "</div><br>";
                    echo "</div>";

                }

                echo "</div>";

        ?>
        </div> <!-- produtos-container -->
    
        <div class="titulo-inicial">
            <a href="./venda/selecao_produtos_front.php"><p>MAIS PRODUTOS</p></a>
        </div> <!-- titulo-inicial -->
    
        <div class="texto-container">
                <img src="../ecommerce_CRUD_novo/img/organizarse.jpg" data-aos="fade-right">
            <div class="texto-frase-container">
                <h4 data-aos="fade-left">ORGANIZAR-SE</h4>
                <br>
                <p data-aos="fade-left">
                    É a melhor maneira de começar. <br>
                    Viver é maravilhoso <br>
                    e prazeroso quando se vive bem <br>
                    e estende-se que <br>
                    tudo tem o seu papel na vida!
                </p>
                <br><br>
                <a href="./venda/selecao_produtos_front.php"><input type="submit" value="&nbsp;QUERO ME ORGANIZAR!&nbsp;"></a>
            </div>
        </div> <!-- texto-container -->
    
        <div class="titulo-inicial">
            <p>NOSSOS PRODUTOS</p>
        </div> <!-- titulo-inicial -->

        <div class="imagensprod">
            <div class="imagensprodcaixa">
                <div class="caixaimg">
                    <img src="../ecommerce_CRUD_novo/img/3img.jpg" class="img-responsive">
                </div>
                <div class="caixatxt">
                    <h4>QUALIDADE</h4>
                    <br>
                    <p>Nossos produtos são <br>
                    de fornecedores que <br>
                    prezam qualidade dos materiais. </p>
                </div>
            </div>

            <div class="imagensprodcaixa">
                <div class="caixaimg">
                    <img src="../ecommerce_CRUD_novo/img/2img.jpg" alt="">
                </div>
                <div class="caixatxt">
                    <h4>ORGANIZE-SE</h4>
                    <br>
                    <p>Torne seus ambientes <br>
                    do seu dia a dia mais <br>
                    confortaveis e organizados, <br></p>
                </div>
            </div>

            <div class="imagensprodcaixa">
                <div class="caixaimg">
                    <img src="../ecommerce_CRUD_novo/img/1img.jpg" alt="">
                </div>
                <div class="caixatxt">
                    <h4>ESTETICA</h4>
                    <br>
                    <p>Produtos que se <br>
                    encaixam onde você <br>
                    quer, funcionalidade e beleza. </p>
                </div>
            </div>
        </div>

        <div class="titulo-inicial">
            <p>REDES SOCIAIS</p>
        </div> <!-- titulo-inicial -->
    
        <div class="redes-container">
            <div class="icon-redes">
                <a href="#"><img src="../ecommerce_CRUD_novo/img/img-redessociais/logo-faceboock.png"></a>
            </div> &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="icon-redes">
                <a href="https://instagram.com/organiza_maiss" target="_blank">
                <img src="../ecommerce_CRUD_novo/img/img-redessociais/logo-insta.png"></a>
            </div> &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="icon-redes">
                <a href="#"><img src="../ecommerce_CRUD_novo/img/img-redessociais/logo-twitter.png"></a>
            </div>
        </div>
    
        <div class="video-produto-container">
            <div class="video-principal">
                <iframe width="644" height="366" src="https://www.youtube.com/embed/72Atpb8E8W4" 
                title="Organizadores de Gaveta - Plasútil" frameborder="0" allow="accelerometer; 
                autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="videos-direita">
                <iframe width="322" height="181" src="https://www.youtube.com/embed/hhGoP7LYySc" 
                title="Organizadores Multiuso - Plasútil" frameborder="0" allow="accelerometer; 
                autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br>
                <iframe width="322" height="181" src="https://www.youtube.com/embed/9ny3b72vJNg" 
                title="Garrafas Abre Fácil - Plasútil" frameborder="0" allow="accelerometer; 
                autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    
        <div class="sobre-informacoes-container">
            <a href="#Topo"><img src="../ecommerce_CRUD_novo/img/volta-topo-btn.png" id="btn-voltopo"></a>
            <h3>DESENVOLVIMENTO</h3>
            <p>Isaque 09 • Leandro 11 • Vinicius 22 • Allan 02</p>
            <br>
            <div class="linha-sobre-informacoes"></div>
            <br>
            <div class="logos-container">
                <div class="sobre-inf-parceria">
                    <h3>PARCERIA</h3>
                    <br>
                    <a href="https://www.lojaplasutil.com.br/" target="_blank">
                        <img src="../ecommerce_CRUD_novo/img/sobre-info-img/logo_plasutil.png"></a>
                    &nbsp;
                    <a href="https://toplineud.com.br/" target="_blank">
                        <img src="../ecommerce_CRUD_novo/img/sobre-info-img/logo_topline.png"></a>
                </div>
                <div class="sobre-inf-formapag">
                    <h3>FORMAS DE PAGAMENTO</h3>
                    <br>
                    <img src="../ecommerce_CRUD_novo/img/sobre-info-img/elo_logo.png">
                    <img src="../ecommerce_CRUD_novo/img/sobre-info-img/master_logo.png">
                    <img src="../ecommerce_CRUD_novo/img/sobre-info-img/pix_logo.png">
                    <img src="../ecommerce_CRUD_novo/img/sobre-info-img/visa_logo.png">
                    <img src="../ecommerce_CRUD_novo/img/sobre-info-img/boleto_logo.png">
                </div>
            </div>
            <br>
            <p>
                © 2021-2022 Site.com | SAC : +55 (14) 9999-9999 <br>
                Av. Nações Unidas, 58-50 - Nucleo Res. Pres. Geisel, Bauru - SP, 17033-260
            </p>
        </div> <!-- sobre-informacoes-container -->

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init();
        </script>
    </div>
</body>
</html>