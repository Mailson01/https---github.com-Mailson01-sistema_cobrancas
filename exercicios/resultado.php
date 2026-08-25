<?php

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Cobrança</title>
</head>

<body>

    <h1>LISTAGEM DE PRODUTOS</h1>
  

</body>
</html>
<?php
echo "NOME DO PRODUTO: $nome<br>
      VALOR : $valor<br>
      QUANTIDADE: $quantidade<br><br<br>";

      $calculo = ($quantidade * $valor);
      echo "<br><br> O TOTAL COMPRADO FOI DE R$ ".number_format($calculo, 2, ',', '.').'<BR><BR><BR>';
        $desc = ($calculo*10/100);
      if ($calculo > 500){
        $vlrfinal = ($calculo - $desc);
        echo "PARABENS SUA COMPRA ATINGIU O A META DE 500 REAIS DE COMPRAS!!!<BR>
        SENDO ASSIM VOCÊ TERÁ 10% DE DESCONTO:)<br><br><br><br>";
        echo "O VALOR FINAL DE SUA COMPRA É DE ".number_format($vlrfinal, 2, ',', '.');
      }else{
        echo "OBRIGADO (A) PELA COMPRA, VOLTE SEMPRE!!";
      }