<link rel="stylesheet" src="http://200.145.153.175/isaquesantana/Ecommerce/ecommerce_CRUD_novo/email/email.css">

<?php
/*
 * This example shows settings to use when sending via Google's Gmail servers.
 */
include "../utils/conexao.php";
session_start();

$resultado_lista = $_SESSION['produtosorganizamais'];

// $resultado_lista = $_SESSION['itensvendaorganizamais'];
// $email = $_SESSION['usuariologado']['email'] ?? 0;
// $sql = "SELECT cod_produto, qtde, preco FROM itensvendaorganizamais";
// $resultado= pg_query($conecta, $sql); 
// echo $sql;

//SMTP needs accurate times, and the PHP time zone MUST be set
date_default_timezone_set('Etc/UTC');

//Carrega as bibliotecas de classes
require '../email/PHPMailer/PHPMailerAutoload.php';
//require './PHPMailer/PHPMailerAutoload.php';

//Cria uma nova instância da classe PHPMailer
$mail = new PHPMailer;

//Diz ao PHPMailer para usar SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.kinghost.net';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = '';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'projetoscti09@projetoscti.com.br'; //Preencher com o usuário da sua conta Gmail

//Password to use for SMTP authentication
//$mail->Password = 'YfTvkhprsLC0OJn5'; //Preencher com a senha do usuário da sua conta Gmail
$mail->Password = 'E!maildoprof';

//Set who the message is to be sent from
$mail->From='leandro.camanforte@unesp.br'; //Preencher com a sua conta Gmail

$mail->FromName='E-commerce CTI'; //Preencher com o nome do remetente

//Set who the message is to be sent to
$mail->addAddress($email); //Preencher com o email e nome de quem receberá a mensagem

//Set the subject line
$mail->Subject = 'Teste PHPMailer 5.2 com Gmail'; //Preencher com o assunto do email

$mail->isHTML(true); //Configurar mensagem como HTML

$mail->CharSet='UTF-8'; //Configurar conjunto de caracteres da mensagem em HTML

//Replace the plain text body with one created manually
//$mail->Body = 

$bd = "
        <link rel='stylesheet' src='http://200.145.153.175/isaquesantana/Ecommerce/ecommerce_CRUD_novo/email/email.css'>
        <br><br>
        Recibo da compra de seu produto!<br>
        <hr>
        <div class='table'>
            <div class='row'>
                <div class='cell cellDescricao cellHeader'>
                    Descricao
                </div>
                <div class='cell cellPreco cellHeader'>
                    Preco
                </div>
                <div class='cell cellPreco cellHeader'>
                    Qtde.
                </div>
                <div class='cell cellPreco cellHeader'>
                    Subtotal
                </div>
            </div>";
        
            
            $total = 0.0;
        
            // Criar linhas com os dados dos produtos
            foreach ($resultado_lista as $linha)
            { 
                    $idprod = $linha['cod_produto'];
                    $total += floatval($linha['subtotal']);
            
            $bd = $bd."
                    <div class='row'>
                        <div class='cell cellDescricao'>".$linha['descricao']."
                        </div>
                        <div class='cell cellPreco'>".$linha['preco']."
                        </div>
                        <div class='cell cellPreco'>".$linha['qtde']."
                        </div>
                        <div class='cell cellPreco'>".$linha['subtotal']."
                        </div>
                    </div>";

            }
                $bd = $bd."<h3>Total: R$ ".number_format($total, 2, ',', '.')."</h3>";



  $bd = $bd."</body></html>"; //Mensagem em HTML

  $mail->Body = $bd;

  //var_dump($bd);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Enviamos um recibo para seu email.";

}
pg_close($conecta);