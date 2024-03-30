<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Produtos - organiza+</title>
    <link rel="stylesheet" href="../css/style-cadastro.css">
</head>
<body>
    <div class="container-form-cadastro">
        <form action="cad_novo_produtos_back.php" method="post" enctype="multipart/form-data"> <!-- Falta o arquivo -->
            <h1>CADASTRO DE PRODUTOS</h1>
                <div class="form-produto" id="block1">
                    <fieldset>
                        <legend>PRODUTO</legend><br>
                
                        <label> <!-- Nome / nomeProduto -->
                            <strong>NOME:</strong><br>
                            <input type="text" name="nome" 
                            required autofocus size="40" maxlength="20"
                            placeholder="Camiseta"/><br>
                        </label>
                        <label> <!-- Descrição / descricao -->
                            <strong>DESCRIÇÃO:</strong><br>
                            <textarea name="descricao" cols="40" rows="6" 
                            style="resize: none" placeholder="Preta com estampa florida..." 
                            autofocus></textarea><br>
                        </label>
                        <label> <!-- Preço / precoProduto -->
                            <strong>PREÇO:</strong><br> <!--type="number"-->
                            <input type="text" name="preco"   
                            required autofocus size="40" maxlength="7"
                            placeholder="R$ / 29.90"/><br>
                        </label>
                        <label> <!-- Código Visual / codigoVisual -->
                            <strong>CÓDIGO VISUAL:</strong><br>
                            <input type="text" name="codigoVisual" 
                            required autofocus size="40" maxlength="35"
                            placeholder="Código de barras"/><br>
                        </label>
                        <label> <!-- Custo do produto / custo -->
                            <strong>CUSTO DE FABRICAÇÃO:</strong><br> <!--type="number"-->
                            <input type="text" name="custo" 
                            required autofocus size="40" maxlength="10"
                            placeholder="R$ / 00.00"/><br>
                        </label>
                        <label> <!-- Margem de Lucro / margemLucro -->
                            <strong>MARGEM DE LUCRO:</strong><br> <!--type="number"-->
                            <input type="text" name="margemLucro" 
                            required autofocus size="40" maxlength="10"
                            placeholder="R$ / 00.00"/><br>
                        </label>
                        <label> <!-- ICMS / icms -->
                            <strong>ICMS:</strong><br> <!--type="number"-->
                            <input type="text" name="icms" 
                            required autofocus size="40" maxlength="10"
                            placeholder="R$ / 00.00"/><br>
                        </label>
                        
                        <br>
                    </fieldset>
                </div>

                <div class="form-estoque">
                    <fieldset>
                        <legend> &nbsp; ESTOQUE&nbsp; </legend><br>

                        <label>
                            <strong>COR:</strong><br>
                            <select name="cod_cor" size="1" id="input-estoque"> <!-- Tem que retornar valor 1,2,3,4...-->
                                <option value="1">Preto</option>
                                <option value="2">Branco</option>
                                <option value="3">Vermelho</option>
                                <option value="4">Azul</option>
                                <option value="5">Cinza</option>
                                <option value="6">Nenhum</option>
                            </select>
                        </label>
                        <br>
                        
                        <br>
                        <label> <!-- Quantidade de Produtos / qtdeProduto -->
                            <strong>QUANTIDADE DE PRODUTOS:</strong><br> <!--type="number"-->
                            <input type="number" min="1" name="qtdeProduto" 
                            required autofocus size="40" maxlength="35" 
                            placeholder="10"/><br>
                        </label>
                        <br>
                        <label> <!-- Quantidade de Produtos / qtdeProduto -->
                            <strong>MARCA DOS PRODUTOS:</strong><br> <!--type="number"-->
                            <input type="radio" name="marca" value = "Plasutil"
                            required autofocus size="20" maxlength="35" /> Plasutil<br>
                            <input type="radio" name="marca" value = "Top Line"
                            required autofocus size="20" maxlength="35" /> Top Line<br>
                        </label>
                        <br>
                        <label> <!-- URL da imagem / campoImagem -->
                            <strong>CAMPO IMAGEM:</strong><br>
                            <input type="file" accept="image/JPEG,image/PNG,image/JPG" name="campoImagem" 
                            required autofocus/>
                            <br>
                        </label>
                        <br>
                        <input type="submit" name="button" id="button" value="Enviar" />
                        <a href='pesqprodutos_front.php'>Voltar</a><br><br>
                    </fieldset>
                </div>
                
        </form>
    </div>
    
</body>
</html>