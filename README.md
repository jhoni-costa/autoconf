# 🚗 Autoconf - Gestão de Veículos

Sistema de gerenciamento de frotas e veículos desenvolvido em **Laravel 8**, atualizado para oferecer suporte às versões mais recentes do PHP (incluindo PHP 8.5).

## 🛠️ Tecnologias e Requisitos

- **PHP**: `^7.4` | `^8.0` (Testado e compatível com PHP 8.5.5)
- **Framework**: Laravel `^8.83`
- **Banco de Dados**: MySQL `~8.0`
- **Frontend**: Laravel UI / Blade

---

## 🚀 Guia de Instalação

Siga os passos abaixo para configurar o ambiente de desenvolvimento:

### 1. Preparação do Banco de Dados
Certifique-se de que o MySQL está rodando e crie o banco de dados principal:
```sql
CREATE DATABASE autoconf;
```

### 2. Configuração do Projeto
No terminal, dentro da pasta raiz do projeto, execute:

```bash
# Instalar dependências do Composer
composer install

# Criar arquivo de configuração ambiental
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

### 3. Configuração do Ambiente (.env)
Abra o arquivo `.env` e verifique as credenciais do banco de dados:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=autoconf
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrações e Permissões
Prepare a estrutura do banco e as pastas de upload:

```bash
# Executar migrações do banco de dados
php artisan migrate

# Definir permissões para a pasta de fotos
chmod -R 777 public/photos
```

---

## 💻 Como Rodar

Para iniciar o servidor de desenvolvimento:

```bash
php artisan serve
```
O projeto estará disponível em `http://127.0.0.1:8000`.

---

## 🔧 Manutenção e Compatibilidade (PHP 8.5+)

O projeto foi recentemente atualizado para garantir estabilidade em ambientes modernos:
- **Dependências**: Atualizadas via `composer.lock` para suportar restrições de versão do PHP 8.5.
- **Correções de Depreciação**: Ajustes em constantes do PDO e tratamentos de tipos nulos em bibliotecas de terceiros (`voku/portable-ascii`).
- **Upload de Arquivos**: O fluxo de pastas e nomes de arquivos foi validado para evitar erros de variáveis indefinidas.