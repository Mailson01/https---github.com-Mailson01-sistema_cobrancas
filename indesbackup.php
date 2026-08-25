<?php

class Fiado {
    public $cliente;
    public $valor;
    public $vencimento;
    public $status;
    public $numeroVenda;
    
  

    public function __construct($cliente, $valor, $vencimento, $status, $numeroVenda){
        $this->cliente = $cliente;
        $this->valor =$valor;
        $this->vencimento = $vencimento;
        $this->status = $status;
        $this->numeroVenda = $numeroVenda;
    }

    public function exibirFiado(){
        return " <br> Valor do débito: {$this->valor}<br> Data do Vencimento: {$this->vencimento}<br> Numero da venda: {$this->numeroVenda}<br>Status da conta : {$this->status}";
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

}

 $contas = [
    new Fiado("João da Silva", 850.00, '2025-05-10', 'Pendente', 9632),
    new Fiado("Maria Souza", 320.50, '2026-12-25', 'Pendente', 9633),
    new Fiado("Carlos Andrade", 150.00, '2025-02-20', 'Pendente', 9634),
    new Fiado("Ana Beatriz", 1200.00, '2026-08-14', 'Pendente', 9635),
    new Fiado("Pedro Martins", 430.00, '2026-01-10', 'Pendente', 9636)
];
