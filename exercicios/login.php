<?php

$login = $_POST['nome'];
$senha = $_POST['senha'];

if ($login == 'mailson' AND $senha== '1234'){
    echo "SEJA BEM VINDO mailson!";
}else{
    echo "LOGIN OU SENHA INCORRETO";
}
