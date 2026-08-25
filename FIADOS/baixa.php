<?php
include_once "../index.php";
$venda = $_GET['venda'];

foreach ($contas as $conta){
    if ($conta->numeroVenda == $venda){
        $conta->status = 'PAGO';
    }
}


