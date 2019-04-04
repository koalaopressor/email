<?php
header("Content-type: text/html; charset=utf-8");
ini_set('display_errors', true);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

require 'assets/php/email.php';

$lista_emails = file('assets/lista/emails.txt');
?>
<body>
  <form method="post">
    <input type="submit" name="visualizar" value="Visualizar Lista">
    <input type="submit" name="enviar" value="Enviar">
  </form>
</body>
<?php
if (isset($_POST['enviar'])) {
  $i = 0;
  foreach ($lista_emails as $chave => $valor) :
    echo 'Enviado '.$i.': ' .$valor. '<br>';

    enviar($valor);
    $i ++;
  endforeach;
}
else if (isset($_POST['visualizar'])) {
  $i = 0;
  foreach ($lista_emails as $chave => $valor) :
    echo 'Lista '.$i.': ' .$valor. '<br>';

    $i ++;
  endforeach;
}

?>
