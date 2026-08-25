<?php
include_once '../conexao.php';
include_once 'fiado.php';

$dataAtual = Date('Y-m-d');

$sql = "SELECT fiado.*, clientes.nome
FROM fiado
INNER JOIN clientes
ON fiado.cliente_id = clientes.id";
$query = $pdo->prepare($sql);
$query->execute();

$fiados = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Listagem de fiados</title>

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
    padding:32px 36px;
}

.topo{
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:16px;
    margin-bottom:24px;
}

.topo h1{
    font-size:22px;
    font-weight:700;
}

.topo p{
    font-size:13px;
    color:var(--texto-secundario);
    margin-top:2px;
}

.btn{
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:11px 18px;
    border:1px solid var(--borda);
    border-radius:8px;
    font-size:14px;
    font-weight:500;
    font-family:inherit;
    cursor:pointer;
    transition:background .15s ease, border-color .15s ease;
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

.btn-secundario{
    background:var(--branco);
    color:var(--texto-principal);
}

.btn-secundario:hover{
    background:var(--azul-claro);
    border-color:var(--azul);
    color:var(--azul-escuro);
}

.painel{
    background:var(--branco);
    border:1px solid var(--borda);
    border-radius:12px;
    overflow:hidden;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead th{
    text-align:left;
    font-size:12px;
    font-weight:600;
    color:var(--texto-secundario);
    text-transform:uppercase;
    letter-spacing:.4px;
    padding:14px 18px;
    background:var(--fundo);
    border-bottom:1px solid var(--borda);
}

tbody td{
    padding:14px 18px;
    font-size:14px;
    border-bottom:1px solid var(--borda);
    vertical-align:middle;
}

tbody tr:last-child td{
    border-bottom:none;
}

tbody tr:hover{
    background:var(--azul-claro);
}

.cliente{
    font-weight:500;
}

.valor{
    font-weight:600;
}

.situacao{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:5px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.situacao.vencido{
    background:var(--vermelho-claro);
    color:var(--vermelho);
}

.situacao.em-dia{
    background:var(--verde-claro);
    color:var(--verde);
}

.situacao i{
    font-size:10px;
}

.acoes-tabela{
    display:flex;
    gap:8px;
}

.acoes-tabela form{
    display:inline;
}

.btn-icone{
    width:34px;
    height:34px;
    border:1px solid var(--borda);
    border-radius:8px;
    background:var(--branco);
    color:var(--texto-secundario);
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:13px;
    transition:background .15s ease, border-color .15s ease, color .15s ease;
}

.btn-icone:hover{
    background:var(--azul-claro);
    border-color:var(--azul);
    color:var(--azul-escuro);
}

.btn-icone.excluir:hover{
    background:var(--vermelho-claro);
    border-color:var(--vermelho);
    color:var(--vermelho);
}

.vazio{
    padding:48px 18px;
    text-align:center;
    color:var(--texto-secundario);
    font-size:14px;
}

.rodape-acoes{
    margin-top:24px;
    display:flex;
    gap:12px;
}

@media (max-width:768px){
    body{ padding:20px; }
    .painel{ overflow-x:auto; }
    table{ min-width:640px; }
}

</style>
</head>
<body>

<div class="topo">
    <div>
        <h1>Listagem de clientes inadimplentes</h1>
        <p>Controle de débitos em aberto e vencidos</p>
    </div>
    <a href="form_cadastro.php" class="btn btn-primario">
        <i class="fa-solid fa-plus"></i> Cadastrar fiado
    </a>
</div>

<div class="painel">

    <?php if (count($fiados) > 0): ?>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Vencimento</th>
                <th>Situação</th>
                <th>Nº venda</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fiados as $fiado):

                $vencimento = Date($fiado['vencimento']);
                $dataVencimento = Date($fiado['vencimento']);
                $estaVencido = ($dataAtual >= $vencimento);
            ?>
            <tr>
                <td class="cliente"><?php echo $fiado['nome']; ?></td>
                <td class="valor">R$ <?php echo number_format($fiado['valor'], 2, ',', '.'); ?></td>
                <td><?php echo $fiado['vencimento']; ?></td>
                <td>
                    <?php if ($estaVencido): ?>
                        <span class="situacao vencido"><i class="fa-solid fa-circle"></i> Vencido</span>
                    <?php else: ?>
                        <span class="situacao em-dia"><i class="fa-solid fa-circle"></i> Em dia</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $fiado['numerovenda']; ?></td>
                <td>
                    <div class="acoes-tabela">
                        <form action="formEditar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $fiado['id']; ?>">
                            <button type="submit" class="btn-icone" title="Editar">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </form>
                        <form action="excluirFiado.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $fiado['id']; ?>">
                            <button type="submit" class="btn-icone excluir" title="Excluir">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        <form action="baixa.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $fiado['id']; ?>">
                            <button type="submit" class="btn-icone dinheiro" title="Dar Baixa">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php else: ?>
        <div class="vazio">Nenhum fiado cadastrado ainda.</div>
    <?php endif; ?>

</div>

<div class="rodape-acoes">
    <a href="../index.php" class="btn btn-secundario">
        <i class="fa-solid fa-house"></i> Tela inicial
    </a>
</div>

</body>
</html>