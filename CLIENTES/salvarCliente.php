<?php
include_once '../conexao.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

// Passo 1: verifica se já existe um cliente com esse CPF
$sqlVerifica = "SELECT * FROM clientes WHERE cpf = :cpf";
$queryVerifica = $pdo->prepare($sqlVerifica);
$queryVerifica->bindParam(':cpf', $cpf);
$queryVerifica->execute();

$clienteExistente = $queryVerifica->fetch();

// Passo 2: se encontrou algo, é porque o CPF já está cadastrado
if ($clienteExistente) {

    $erro = "Não é possível cadastrar: já existe um cliente com este CPF.";

} else {

    // Passo 3: CPF não existe ainda, segue o cadastro normal
    $sql = "INSERT INTO clientes (nome,telefone,cpf,endereco) VALUES (:nome, :telefone, :cpf, :endereco)";
    $query = $pdo->prepare($sql);

    $query->bindParam(':nome', $nome);
    $query->bindParam(':telefone', $telefone);
    $query->bindParam(':cpf', $cpf);
    $query->bindParam(':endereco', $endereco);

    $query->execute();

    header("refresh:3;url=listarClientes.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($erro) ? 'Erro no cadastro' : 'Cliente cadastrado'; ?></title>

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
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    margin:0 auto 20px;
}

.icone-status.sucesso{
    background:var(--verde-claro);
    color:var(--verde);
}

.icone-status.erro{
    background:var(--vermelho-claro);
    color:var(--vermelho);
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

.btn.btn-erro{
    background:var(--vermelho);
    border-color:var(--vermelho);
}

.btn.btn-erro:hover{
    background:#B91C1C;
    border-color:#B91C1C;
}

</style>
</head>
<body>

<div class="painel">

    <?php if (isset($erro)): ?>

        <div class="icone-status erro">
            <i class="fa-solid fa-xmark"></i>
        </div>

        <h1>Não foi possível cadastrar</h1>
        <p><?php echo $erro; ?></p>

        <a href="cadastroCliente.php" class="btn btn-erro">
            <i class="fa-solid fa-arrow-left"></i> Voltar e corrigir
        </a>

    <?php else: ?>

        <div class="icone-status sucesso">
            <i class="fa-solid fa-user-check"></i>
        </div>

        <h1>Cadastro realizado com sucesso!</h1>
        <p>O cliente foi adicionado ao sistema.</p>

        <div class="contador">
            Você será redirecionado em <span id="segundos">3</span> segundos...
        </div>

        <a href="listarClientes.php" class="btn">
            <i class="fa-solid fa-list"></i> Ir para listagem agora
        </a>

        <script>
            let segundos = 3;
            const elemento = document.getElementById('segundos');
            setInterval(() => {
                segundos--;
                if (segundos >= 0) elemento.textContent = segundos;
            }, 1000);
        </script>

    <?php endif; ?>

</div>

</body>
</html>