# Cotação de Moedas - Painel Administrativo

## Teste realizado para a empresa: Mawa Post

## O que é este projeto?
- O projeto tem como objetivo realizar a cotação de moedas utilizando uma API: https://docs.awesomeapi.com.br/api-de-moedas e registrar no banco de dados as cotações.

- Através de um Painel Admnistrativo, é possível acessar todo o histórico de cotações por usuário;
- Sistema de Autenticação com Login / Novo Registro de Usuário;

## Para rodar este projeto
```bash
$ git clone https://github.com/fabiosperotto/laravel-blog
$ cd laravel-blog
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan serve
$ php artisan db:seed #para gerar os seeders, dados de teste
```
