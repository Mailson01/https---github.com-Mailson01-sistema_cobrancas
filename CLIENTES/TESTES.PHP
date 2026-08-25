<?php

$sql = "UPDATE  clientes SET nome = :nome, telefone = :telefone, cpf = :cpf, endereco = :endereco WHERE id = :id ";
$query = $pdo->prepare($sql);
$query->bindParam(':nome', $nome);
$query->bindParam(':telefone', $telefone);
$query->bindParam(':cpf', $cpf);
$query->bindParam(':endereco', $endereco);

$query->execute();

echo "Cadastro Atualizado com Sucesso!";
