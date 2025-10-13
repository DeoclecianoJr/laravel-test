# laravel-test

## Ambiente Local com Docker

Este projeto possui um ambiente de desenvolvimento local configurado com Docker.

### Requisitos

- Docker
- Docker Compose

### Configuração Inicial

1. Clone o repositório:
```bash
git clone https://github.com/DeoclecianoJr/laravel-test.git
cd laravel-test
```

2. Copie o arquivo de ambiente para Docker:
```bash
cp .env.docker .env
```

3. Inicie os containers:
```bash
docker-compose up -d
```

4. Instale as dependências do PHP:
```bash
docker-compose exec app composer install
```

5. Gere a chave da aplicação:
```bash
docker-compose exec app php artisan key:generate
```

6. Execute as migrations:
```bash
docker-compose exec app php artisan migrate
```

7. Instale as dependências do Node.js:
```bash
docker-compose exec app npm install
```

8. Compile os assets:
```bash
docker-compose exec app npm run build
```

### Acessando a Aplicação

Após a configuração, a aplicação estará disponível em: http://localhost:8000

### Serviços Docker

- **app**: Container PHP-FPM com PHP 8.3
- **nginx**: Servidor web Nginx
- **db**: Banco de dados MySQL 8.0

### Comandos Úteis

Executar comandos Artisan:
```bash
docker-compose exec app php artisan [comando]
```

Executar comandos Composer:
```bash
docker-compose exec app composer [comando]
```

Executar comandos NPM:
```bash
docker-compose exec app npm [comando]
```

Acessar o container da aplicação:
```bash
docker-compose exec app bash
```

Parar os containers:
```bash
docker-compose down
```

### Persistência de Dados

Os dados do banco de dados MySQL são persistidos em um volume Docker chamado `dbdata`, garantindo que os dados não sejam perdidos quando os containers forem parados ou removidos.