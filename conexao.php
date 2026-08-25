<?php


     $host = 'localhost';
     $dbname = 'sistema_cobrancas';
     $user = 'root';
     $password = '';

    try{
        $pdo = new PDO ("mysql:host=$host;
        dbname=$dbname;
        user=$user;
        password=$password");

       


    }catch(PDOexception $e){


        echo "ERRO NA CONEXÃO".$e->getMessage();
    }
