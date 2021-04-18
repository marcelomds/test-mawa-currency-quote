# Cotação de Moedas - Painel Administrativo

## Teste realizado para a empresa: Mawa Post

## O que é este projeto?
- O projeto tem como objetivo realizar a cotação de moedas utilizando uma API: https://docs.awesomeapi.com.br/api-de-moedas e registrar no banco de dados as cotações.

- Através de um Painel Admnistrativo, é possível acessar todo o histórico de cotações por usuário;
- Sistema de Autenticação com Login / Novo Registro de Usuário;

## Acessar a pasta da Api

    digite cd test_api_fortbrasil

Instalar os pacotes composer

    composer install && npm run dev

Copie o arquivo .env.example e faça as alterações de configuração necessárias no arquivo .env
Para criar seu banco de dados da Aplicação

    cp .env.example .env

Gerar uma nova chave da aplicação

    php artisan key:generate

Criar as Tabelas

    php artisan:migrate

Iniciar o Servidor

    php artisan serve
