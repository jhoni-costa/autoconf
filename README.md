## ⚠️ Setup

- Para iniciar é necessario criar um banco de dados com nome de `autoconf`: `create database autoconf;`;
- Na raiz do projeto, rode `composer install`, `cp .env.example .env`, `php artisan key:generate`;
- No .env, defina as configurações do banco de dados com nome a senha, caso tenha;
- Rode as migrations do Laravel com o comando `php artisan migrate`;
- Para rodar o projeto: `php artisan serve`;
- É necessário dar permissão para a pasta public/photos. Na raiz do projeto execute no terminal: `chmod -R 777 public/photos`

## 🔀 Dependências e versões

- MySQL ~8.0;
- PHP ~7.4;
- Laravel ~8.83;