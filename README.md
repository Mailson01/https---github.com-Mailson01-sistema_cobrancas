

# Sistema de Cobranças

Sistema web para cadastrar, organizar e acompanhar cobranças, clientes e pagamentos. O projeto foi pensado para facilitar o controle financeiro e reduzir o acompanhamento manual de valores em aberto.

## Funcionalidades

- Cadastro e edição de clientes;
- Registro de cobranças e valores;
- Acompanhamento de vencimentos;
- Consulta de cobranças pagas, pendentes e vencidas;
- Organização das informações financeiras em um único lugar.

## Tecnologias

Este sistema é executado localmente através do XAMPP. Complete esta seção com as tecnologias efetivamente usadas no projeto, por exemplo:

- PHP;
- MySQL;
- HTML, CSS e JavaScript;
- Apache (XAMPP).

## Pré-requisitos

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) instalado;
- Apache e MySQL iniciados pelo painel do XAMPP;
- Um navegador atualizado;
- Git (opcional, para versionamento).

## Como executar localmente

1. Copie a pasta do projeto para o diretório `htdocs` do XAMPP.
2. Abra o painel do XAMPP e inicie os módulos **Apache** e **MySQL**.
3. Se o sistema utilizar banco de dados, crie ou importe a base pelo phpMyAdmin.
4. No navegador, acesse a URL abaixo, ajustando o nome da pasta caso necessário:

   ```text
   http://localhost/SISTEMA/_COBRANCAS/
   ```

## Banco de dados

Caso exista um arquivo `.sql` no projeto, importe-o no phpMyAdmin:

1. Acesse `http://localhost/phpmyadmin`;
2. Crie o banco de dados configurado no sistema;
3. Selecione o banco criado e use a opção **Importar**;
4. Escolha o arquivo `.sql` e confirme;
5. Atualize as credenciais de conexão do projeto, se necessário.

> Por segurança, não envie senhas, dados de clientes ou arquivos de configuração com credenciais reais para repositórios públicos.

## Estrutura sugerida

```text
_COBRANCAS/
├── assets/          # Estilos, scripts e imagens
├── config/          # Configurações e conexão com o banco
├── database/        # Scripts de banco de dados
├── pages/           # Telas do sistema
├── index.php        # Ponto de entrada da aplicação
└── README.md
```

## Versionamento

Após salvar este arquivo na raiz do projeto, envie-o ao GitHub:

```powershell
git add README.md
git commit -m "docs: adiciona README do sistema"
git push
```

## Autor

Mailson
