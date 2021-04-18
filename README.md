# Cotação de Moedas - Painel Administrativo

## Teste realizado para a empresa: Mawa Post

## O que é este projeto?
- O projeto tem como objetivo realizar a cotação de moedas utilizando uma API: https://docs.awesomeapi.com.br/api-de-moedas e registrar no banco de dados as cotações.

- Através de um Painel Admnistrativo, é possível acessar todo o histórico de cotações por usuário;
- Sistema com Autenticação de Login / Novo Registro de Usuário / Configuração de Usuário (Alterar Senha / Dados de Perfil);

## Para rodar este projeto
```bash
$ git clone https://github.com/marcelomds/test-mawa-currency-quote.git
$ cd test_mawa_currency_quote
$ composer install
$ cp .env.example .env

 ------------ Configurar Banco de Dados no Arquivo .env ------------
 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    
 -------------------------------------------------------------------

$ php artisan key:generate
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan db:seed #para gerar os seeders, dados de teste
$ php artisan serve
```
## Para Acessar Login Inicial

   - Login:  admin@email.com
   - Senha: 123456789
