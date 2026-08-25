<?php
include_once '../conexao.php';

$cliente_id = $_POST['cliente_id'];
$valor = $_POST['valor'];
$vencimento = $_POST['vencimento'];
$numerovenda =$_POST['numerovenda'];
$situacao = 'PENDENTE';




$sql = "INSERT INTO fiado (cliente_id,valor,vencimento,situacao,numerovenda) VALUES (:cliente_id, :valor, :vencimento, :situacao, :numerovenda)";
$query = $pdo->prepare($sql);
$query->bindParam(':cliente_id', $cliente_id);
$query->bindParam(':valor', $valor);
$query->bindParam(':vencimento', $vencimento);
$query->bindParam(':situacao', $situacao);
$query->bindParam(':numerovenda', $numerovenda);

$query->execute();

echo 'Cadastro realizado com sucesso!';
