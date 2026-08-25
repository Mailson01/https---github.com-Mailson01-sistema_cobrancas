<?php

class Fiado {
    public $cliente;
    public $valor;
    public $vencimento;
    public $situacao;
    public $numerovenda;
    
  

    public function __construct($cliente, $valor, $vencimento, $situacao, $numerovenda){
        $this->cliente = $cliente;
        $this->valor =$valor;
        $this->vencimento = $vencimento;
        $this->situacao = $situacao;
        $this->numerovenda = $numerovenda;
    }

    public function exibirFiado(){
        return " <br> Valor do débito: {$this->valor}<br> Data do Vencimento: {$this->vencimento}<br> Numero da venda: {$this->numerovenda}<br>Status da conta : {$this->situacao}";
    }

    public function verifVencimento(){
     $vencimento = new DateTime($this->vencimento);
     $dataAtual = new DateTime();
     if ($vencimento > $dataAtual){
        return" CONTA EM DIAS";
     }else{
        return  "CONTA VENCIDA!";
     }
    }
   public function estaVencido(){
      $vencimento = new DateTime($this->vencimento);
      $dataAtual = new DateTime();
    if ($vencimento < $dataAtual){
    return True;
    }else{
        return False;
    }
   }
   public function gerarCobranca(){
    return "Olá {$this->cliente->nome},

Identificamos um débito pendente no valor de R$ 850,00
referente à venda nº 9632.

Pedimos por gentileza que regularize o pagamento.

Obrigado.";
   }

public function realizarPagamento(){

}

}