<?php

include_once '../conexao.php';

$id = $_POST['id'];

$sql = "SELECT * FROM clientes WHERE id = :id";

$query = $pdo->prepare($sql);

$query->bindParam(':id', $id);

$query->execute();

$cliente = $query->fetch();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Atualizar cliente</title>

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
    max-width:480px;
    padding:32px;
}

.painel-topo{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:24px;
}

.painel-icone{
    width:42px;
    height:42px;
    border-radius:10px;
    background:var(--azul-claro);
    color:var(--azul);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    flex-shrink:0;
}

.painel-topo h1{
    font-size:18px;
    font-weight:700;
    color:var(--texto-principal);
}

.painel-topo p{
    font-size:13px;
    color:var(--texto-secundario);
}

.campo{
    margin-bottom:18px;
}

.campo label{
    display:block;
    font-size:13px;
    font-weight:500;
    color:var(--texto-secundario);
    margin-bottom:6px;
}

.campo input{
    width:100%;
    padding:11px 14px;
    border:1px solid var(--borda);
    border-radius:8px;
    font-size:14px;
    font-family:inherit;
    color:var(--texto-principal);
    background:var(--fundo);
    transition:border-color .15s ease, background .15s ease;
}

.campo input:focus{
    outline:none;
    border-color:var(--azul);
    background:var(--branco);
}

.acoes{
    display:flex;
    gap:12px;
    margin-top:28px;
}

.btn{
    flex:1;
    padding:12px 18px;
    border:1px solid var(--borda);
    border-radius:8px;
    cursor:pointer;
    font-size:14px;
    font-weight:500;
    font-family:inherit;
    text-decoration:none;
    text-align:center;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    transition:background .15s ease, border-color .15s ease;
}

.btn-secundario{
    background:var(--branco);
    color:var(--texto-principal);
}

.btn-secundario:hover{
    background:var(--azul-claro);
    border-color:var(--azul);
    color:var(--azul-escuro);
}

.btn-primario{
    background:var(--azul);
    border-color:var(--azul);
    color:#fff;
}

.btn-primario:hover{
    background:var(--azul-escuro);
    border-color:var(--azul-escuro);
}

</style>

</head>
<body>

<div class="painel">

    <div class="painel-topo">
        <div class="painel-icone"><i class="fa-solid fa-user-pen"></i></div>
        <div>
            <h1>Atualizar cliente</h1>
            <p>Edite os dados do cliente selecionado</p>
        </div>
    </div>

    <form action="atualizaClientes.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

        <div class="campo">
            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>">
        </div>

        <div class="campo">
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>">
        </div>

        <div class="campo">
            <label>CPF</label>
            <input type="text" name="cpf" value="<?php echo $cliente['cpf']; ?>">
        </div>

        <div class="campo">
            <label>Endereço</label>
            <input type="text" name="endereco" value="<?php echo $cliente['endereco']; ?>">
        </div>

        <div class="acoes">
            <a href="listarClientes.php" class="btn btn-secundario">Cancelar</a>
            <button type="submit" class="btn btn-primario">
                <i class="fa-solid fa-check"></i> Salvar alterações
            </button>
        </div>

    </form>

</div>

</body>
</html>