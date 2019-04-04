<?php
header("Content-type: text/html; charset=utf-8");
ini_set('display_errors', true);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviar($email, $assunto = 'Assunto teste', $nome_remetente = 'Koala Soft', $host = 'smtp.gmail.com', $user = 'koalasoftbr@gmail.com', $pass = 'koalaroot', $porta = 587) {
  $mail = new PHPMailer(true);
  $mail->isSendmail();
  $mail->isSMTP();
  $mail->isHTML(true);

  try {
    $mail->Host       = $host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $user;
    $mail->Password   = $pass;
    $mail->SMTPSecure = 'TLS';
    $mail->Port       = $porta;
    $mail->Subject    = $assunto;
    $mail->charSet    = "UTF-8";

    $mail->setFrom   ($user, $nome_remetente);
    $mail->addReplyTo($user, $nome_remetente);
    $mail->addAddress($email);

    $mail->msgHTML      (file_get_contents('assets/conteudo/cont.html'), __DIR__);
    $mail->addAttachment('assets/pdf/Braavo-Apresentacao-2018.pdf');

    $mail->send();
  }
  catch (Exception $e) {
    echo "Mensagems nao enviadas: {$mail->ErrorInfo}";
  }
}
?>
