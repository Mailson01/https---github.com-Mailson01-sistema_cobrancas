<?php
include_once 'conexao.php';
$dataAtual = date('Y-m-d');

$sql = "SELECT COUNT(*) AS total
        FROM fiado
        WHERE situacao = 'PENDENTE'
        AND vencimento < :dataAtual";

$query = $pdo->prepare($sql);
$query->bindParam(':dataAtual', $dataAtual);
$query->execute();

$resultado = $query->fetch();
$totalVencidos = $resultado['total'];


$sql = "SELECT SUM(valor) AS total
        FROM fiado
        WHERE situacao = 'PENDENTE'";

$query = $pdo->prepare($sql);
$query->execute();

$receber = $query->fetch();

$totalReceber = $receber['total'];


$sql = "SELECT COUNT(*) AS total
        FROM fiado
        WHERE situacao = 'PENDENTE'";

$query = $pdo->prepare($sql);
$query->execute();

$fiadosAtivos = $query->fetch();

$totalFiadosAtivos = $fiadosAtivos['total'];


$sql = "SELECT COUNT(*) AS total FROM clientes";

$query = $pdo->prepare($sql);
$query->execute();

$clientes = $query->fetch();

$totalClientes = $clientes['total'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Cobrança</title>
</head>

<body>
    <!DOCTYPE html>

<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de Gestão de Fiados</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    background:#f4f6f9;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:260px;
    height:100vh;
    background:#1E3A8A;
    color:#fff;
    padding:20px;
}

.logo{
    text-align:center;
    margin-bottom:40px;
}

.logo h2{
    font-size:22px;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    margin-bottom:15px;
}

.sidebar ul li a{
    display:block;
    text-decoration:none;
    color:#fff;
    padding:12px;
    border-radius:8px;
    transition:.3s;
}

.sidebar ul li a:hover{
    background:#2563EB;
}

.sidebar i{
    margin-right:10px;
}

.main{
    margin-left:260px;
    padding:25px;
}

.topo{
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-top:25px;
}

.card{
    background:#fff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h3{
    color:#666;
    margin-bottom:10px;
}

.card h1{
    color:#1E3A8A;
}

.card i{
    font-size:35px;
    color:#2563EB;
    margin-bottom:10px;
}

.atalhos{
    margin-top:30px;
}

.atalhos h2{
    margin-bottom:15px;
}

.botoes{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:15px;
}

.btn{
    text-decoration:none;
}

.btn button{
    width:100%;
    padding:18px;
    border:none;
    background:#2563EB;
    color:#fff;
    border-radius:10px;
    cursor:pointer;
    font-size:16px;
    transition:.3s;
}

.btn button:hover{
    background:#1E40AF;
}

.rodape{
    margin-top:40px;
    text-align:center;
    color:#666;
}

</style>

</head>
<body>

<div class="sidebar">

```
<div class="logo">
    <h2><i class="fa-solid fa-wallet"></i> Gestão Fiados</h2>
</div>

<ul>

    <li>
        <a href="CLIENTES/CadastroCliente.php">
            <i class="fa-solid fa-user-plus"></i>
            Cadastrar Cliente
        </a>
    </li>

    <li>
        <a href="CLIENTES/listarClientes.php">
            <i class="fa-solid fa-users"></i>
            Listar Clientes
        </a>
    </li>

    <li>
        <a href="FIADOS/form_cadastro.php">
            <i class="fa-solid fa-circle-dollar-to-slot"></i>
            Cadastrar Fiado
        </a>
    </li>

    <li>
        <a href="FIADOS/listarFiado.php">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            Listar Fiados
        </a>
    </li>

</ul>
```

</div>

<div class="main">


<div class="topo">

    <h1>Sistema de Gestão de Fiados</h1>

    <p>
        Controle de clientes, débitos, vencimentos e cobranças.
    </p>

</div>

<div class="cards">

<div class="card">
    <i class="fa-solid fa-users"></i>
    <h3>Total de Clientes</h3>
    <h1><?php echo $totalClientes; ?></h1>
</div>

    <div class="card">
    <i class="fa-solid fa-file-invoice-dollar"></i>
    <h3>Fiados Ativos</h3>
    <h1><?php echo $totalFiadosAtivos; ?></h1>
</div>

   <div class="card">
    <i class="fa-solid fa-sack-dollar"></i>
    <h3>Total a Receber</h3>
    <h1>
        R$ <?php echo number_format($totalReceber, 2, ',', '.'); ?>
    </h1>
</div>

    <div class="card">
    <i class="fa-solid fa-triangle-exclamation"></i>
    <h3>Fiados Vencidos</h3>
    <h1><?php echo $totalVencidos; ?></h1>
</div>

</div>

<div class="atalhos">

    <h2>Ações Rápidas</h2>

    <div class="botoes">

        <a class="btn" href="./CLIENTES/cadastroCliente.php">
            <button>Novo Cliente</button>
        </a>
        
         <a class="btn" href="CLIENTES/listarClientes.php">
            <button>Consultar Clientes</button>
        </a>

        <a class="btn" href="./FIADOS/form_cadastro.php">
            <button>Novo Fiado</button>
        </a>

        <a class="btn" href="./FIADOS/listarFiado.php">
            <button>Consultar Fiados</button>
        </a>

       

    </div>

</div>

<div class="rodape">
    Sistema de Gestão de Fiados - Versão 1.0
</div>

</div>

</body>
</html>


   