<link rel="stylesheet" href="../css/cabecalho.css">
<link rel="stylesheet" href="../css/confirmacomp.css">
<link href='https://css.gg/check.css' rel='stylesheet'>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;500&display=swap" rel="stylesheet">

<iframe src="../utils/cabecalho.php" title="cabecalho" frameBorder="0" 
        width="100%" scrolling="no" allowfullscreen>
</iframe>
<?php
    session_start();
	$codusuario = $_SESSION ['usuariologado']['codusuario'] ?? 0;
    include "confirmacao_compra_back.php";
?>

<div class="container">
	<div class='table'>
		<h2>RESUMO DA COMPRA</h2>

		<div class='row'>
			<div class='cell cellNome cellHeader'>
				Nome
			</div>
			<div class='cell cellPreco cellHeader'>
				Preço
			</div>
			<div class='cell cellPreco cellHeader'>
				Qtde.
			</div>
			<div class='cell cellPreco cellHeader'>
				Subtotal
			</div>
		</div>

		<?php
			$total = 0.0;

			// Criar linhas com os dados dos produtos
			foreach ($resultado_lista as $linha)
			{ 
				$idprod = $linha['cod_produto'];
				$total += floatval($linha['subtotal']);
		?>
				<div class='rows'>
					<div class='cell cellNome'>
							<?php echo $linha['nome']; ?>
						</div>
					<div class='cell cellPreco'>
						<?php echo "R$ ".$linha['preco'];"."; ?>
					</div>
					<div class='cell cellPreco'>
						<?php echo $linha['qtde']; ?>
					</div>
					<div class='cell cellPreco'>
						<?php echo "R$ ".$linha['subtotal'];"."; ?>
					</div>
				</div>
		<?php 
			}  
			echo "<h3>Total da compra: R$ ".number_format($total, 2, ',', '.');".</h3>";
		?>

		<br><br>
		<hr>

		<!-- <h3>Deseja confirmar?</h3> -->
		<div class="buttons">
			<a href="finalizacao_compra_front.php" class="button">Finalizar</a>
		</div>
		
		<!-- 
		<br>
		<div class="">
			<a href="#" class="button">Finalizar</a>
		</div>
		<br>

		<button class="button">
			<span class="text">Submit</span>
			<i class="gg-check icon"></i>
		</button> -->
		<br>
		<div class="cancela">
			<a href="carrinho_front.php">Cancelar</a>&nbsp;&nbsp;
		</div>

	</div>
</div>
