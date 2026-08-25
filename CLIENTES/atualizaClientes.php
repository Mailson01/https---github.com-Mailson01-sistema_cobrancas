<?php
include_once '../conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

$sql =  "UPDATE  clientes SET nome = :nome, telefone = :telefone, cpf = :cpf, endereco = :endereco WHERE id = :id ";
$query = $pdo->prepare($sql);
$query->bindParam(':nome', $nome);
$query->bindParam(':telefone', $telefone);
$query->bindParam(':cpf', $cpf);
$query->bindParam(':endereco', $endereco);
$query->bindParam(':id', $id);

$query->execute();

header("refresh:3;url=listarClientes.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cliente atualizado</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>

:root{
    --azul-escuro:#1E3A8A;
    --azul:#2563EB;
    --azul-claro:#EFF4FF;
    --vermelho:#DC2626;
    --vermelho-claro:#FEF2F2;
    --verde:#16A34A;
    --verde-claro:#F0FDF4;
    --texto-principal:#1F2937;
    --texto-secundario:#6B7280;
    --borda:#E5E7EB;
    --fundo:#F4F6F9;
    --branco:#FFFFFF;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Inter', 'Segoe UI', sans-serif;
    background:var(--fundo);
    color:var(--texto-principal);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:24px;
}

.painel{
    background:var(--branco);
    border:1px solid var(--borda);
    border-radius:12px;
    width:100%;
    max-width:420px;
    padding:40px 32px;
    text-align:center;
}

.icone-status{
    width:64px;
    height:64px;
    border-radius:50%;
    background:var(--azul-claro);
    color:var(--azul);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    margin:0 auto 20px;
}

.painel h1{
    font-size:18px;
    font-weight:700;
    color:var(--texto-principal);
    margin-bottom:8px;
}

.painel p{
    font-size:14px;
    color:var(--texto-secundario);
    margin-bottom:24px;
}

.contador{
    font-size:13px;
    color:var(--texto-secundario);
    margin-bottom:24px;
}

.contador span{
    font-weight:600;
    color:var(--azul);
}

.btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:11px 20px;
    border:1px solid var(--azul);
    border-radius:8px;
    background:var(--azul);
    color:#fff;
    text-decoration:none;
    font-size:14px;
    font-weight:500;
    font-family:inherit;
    transition:background .15s ease, border-color .15s ease;
}

.btn:hover{
    background:var(--azul-escuro);
    border-color:var(--azul-escuro);
}

</style>
</head>
<body>

<div class="painel">

    <div class="icone-status">
        <i class="fa-solid fa-user-pen"></i>
    </div>

    <h1>Dados atualizados com sucesso</h1>
    <p>As informações do cliente foram atualizadas.</p>

    <div class="contador">
        Você será redirecionado em <span id="segundos">3</span> segundos...
    </div>

    <a href="listarClientes.php" class="btn">
        <i class="fa-solid fa-list"></i> Ir para listagem agora
    </a>

</div>

<script>
    let segundos = 3;
    const elemento = document.getElementById('segundos');
    setInterval(() => {
        segundos--;
        if (segundos >= 0) elemento.textContent = segundos;
    }, 1000);
</script>

</body>
</html>