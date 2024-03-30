<link rel="stylesheet" href="../css/cabecalho.css">
<link rel="stylesheet" href="../css/carrinho.css">
<link href='https://css.gg/trash.css' rel='stylesheet'>
<iframe src="../utils/cabecalho.php" title="cabecalho" frameBorder="0" 
        width="100%" scrolling="no" allowfullscreen>
</iframe>
<?php
/*
Extraído de:
http://www.davidchc.com.br/video-aula/php/carrinho-de-compras-com-php/
vídeo aula de:https://www.youtube.com/watch?v=CBzfcl-Qk1c

Adaptado por Profa. Ariane Scarelli para banco de dados PostgreSQL (ago/2016)
Adaptado por Prof. Victor rodrigues (ago/2022)
*/
    session_start();
    $acao = $_GET['acao'] ?? '';
    $codproduto = $_GET['cod_produto'] ?? 0;
	$codusuario = $_SESSION ['usuariologado']['codusuario'] ?? 0;
	

	if($codusuario == 0)
    {
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL=/isaquesantana/Ecommerce/ecommerce_CRUD_novo/login/login_usuarios_front.html">';
    }

	if ($acao=='up') {
		if (is_array($_POST['prod']))
			$prods = $_POST['prod'];
		else
			$prods = array();
	}

    include "carrinho_back.php";
?>

<div class="containertable">
	<div class='table'>
		<div class='row'>
			<div class='cell cellImagem cellHeader'>
				Imagem
			</div>
			<div class='cell cellNome cellHeader'>
				Nome
			</div>
			<div class='cell cellDescricao cellHeader'>
				Descrição
			</div>
			<div class='cell cellPreco cellHeader'>
				Preço Uni.
			</div>
			<div class='cell cellPreco cellHeader'>
				Qtde.
			</div>
			<div class='cell cellPreco cellHeader'>
				Subtotal
			</div>
			<div class='cell cellAcoes cellHeader'>
				&nbsp;
			</div>
		</div>

		<form action="?acao=up" method="post">
		
		<?php
			$total = 0.0;
			if($resultado_lista)
			// Criar linhas com os dados dos produtos
			foreach ($resultado_lista as $linha)
			{ 
				$idprod = $linha['cod_produto'];
				$total += floatval($linha['subtotal']);
		?>
			<div class="produtolista">
				<div class='row'>
					<div class='cell cellImagem'>
						<?php echo "<img src= 'data:image/jpeg;base64, " .$linha['campoimagem']."'class='campoimg'/>" ?>
					</div>
					<div class='cell cellNome clnome'>
						<?php echo $linha['nome']; ?>
					</div>
					<div class='cell cellDescricao' id='cellDescricao2'>
						<?php echo $linha['descricao']; ?>
					</div>
					<div class='cell cellPreco'>
						<?php echo "R$ ".$linha['preco'];"."; ?>
					</div>
					<div class='cell cellPreco'>
						<input type="text" size="3" name="prod[<?php echo $idprod; ?>]"
							value="<?php echo $linha['qtde']; ?>" />
					</div>
					<div class='cell cellPreco 'subtot>
						<?php echo "R$ ".$linha['subtotal'];"."; ?>
					</div>
					<div class='cell cellAcoes'>
						<a href='?acao=del&cod_produto=<?php echo $idprod; ?>'><i class="gg-trash"></i></a>
					</div>
				</div>
			</div>	
		
		<!-- <div class="lineprod"><div class="linha"></div></div> -->

		<?php 
			//echo "<br>";
			}  
			echo "<h3>Total da compra: R$ ".number_format($total, 2, ',', '.');".</h3>";
		?>

		<br><br>
		
		<?php
			echo "<div class='containerbotoes'>";
			echo "<input type='submit' value='Atualizar Carrinho' id='btnatt'/>&nbsp;&nbsp;";
			echo "<span class='btncompra'><a href='selecao_produtos_front.php'>Continuar Comprando</a>&nbsp;&nbsp;</span>";
			echo "<span class='btncompra'><a href='confirmacao_compra_front.php'>Finalizar Compra</a></span>";
			echo "</div>";
		
		
		
		
		?>

		</form>

	</div>
</div>

<div class="sobre-informacoes-container">
            <a href="#Topo"><img src="../img/volta-topo-btn.png" id="btn-voltopo"></a>
        
            <div class="logos-container">
                <div class="sobre-inf-parceria">
                    <h3>PARCERIA</h3>
                    <br>
                    <a href="https://www.lojaplasutil.com.br/" target="_blank">
                        <img src="../img/sobre-info-img/logo_plasutil.png"></a>
                    &nbsp;
                    <a href="https://toplineud.com.br/" target="_blank">
                        <img src="../img/sobre-info-img/logo_topline.png"></a>
                </div>
                <div class="sobre-inf-formapag">
                    <h3>FORMAS DE PAGAMENTO</h3>
                    <br>
                    <img src="../img/sobre-info-img/elo_logo.png">
                    <img src="../img/sobre-info-img/master_logo.png">
                    <img src="../img/sobre-info-img/pix_logo.png">
                    <img src="../img/sobre-info-img/visa_logo.png">
                    <img src="../img/sobre-info-img/boleto_logo.png">
                </div>
            </div>
            <br>
            <p>
                © 2021-2022 Site.com | SAC : +55 (14) 9999-9999 <br>
                Av. Nações Unidas, 58-50 - Nucleo Res. Pres. Geisel, Bauru - SP, 17033-260
            </p>
        </div> <!-- sobre-informacoes-container -->
