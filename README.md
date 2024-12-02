### Passo a passo

Crie uma cópia do arquivo de configuração de exemplo: 

```sh
cp .env.example .env
```

Inicie os serviços Docker em segundo plano: 
```sh
docker-compose up -d
```

Abra um terminal dentro do container "app": 
```sh
docker-compose exec app bash
```

Instale as dependências do projeto:
```sh
composer install
```

Gere uma chave de aplicação: 
```sh
php artisan key:generate
```

Execute as migrações do banco de dados:
```sh
php artisan migrate
```
