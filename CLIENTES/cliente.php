<?php
class Cliente{
    public $nome;
    public $telefone;
    public $cpf;
    public $endereco;

    public function __construct($nome, $telefone, $cpf, $endereco){
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
    }

    public function exibirCliente(){
       return "Nome: {$this->nome}<br>Telefone: {$this->telefone}<br> CPF: {$this->cpf}<br> Endereço: {$this->endereco}";
    }
}
