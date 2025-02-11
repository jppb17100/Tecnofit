# Backend Challenge - TecnoFit

API REST desenvolvida em PHP/Lumen para gerenciar ranking de movimentos.

## 🚀 Tecnologias

* PHP 8.1
* Lumen (PHP micro-framework)
* MySQL 5.7
* Docker

## 📋 Pré-requisitos

* Docker
* Docker Compose
* Git

## 🔧 Instalação

1. Clone o repositório
```bash
git clone https://github.com/jppb17100/Tecnofit.git
cd Tecnofit
```

2. Crie o arquivo .env
```bash
cp src/.env.example src/.env
```

Configure as seguintes variáveis no .env:
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=tecnofit
DB_USERNAME=admin
DB_PASSWORD=mysecret
```

3. Inicie os containers Docker
```bash
docker-compose up -d
```

4. Acesse o container da aplicação
```bash
docker exec -it lumen_php bash
```

5. Instale as dependências
```bash
composer install
```

6. Execute as migrations e seeders
```bash
php artisan migrate
php artisan db:seed
```

## 📚 Documentação da API

### Ranking de Movimento

Retorna o ranking de um movimento específico com o nome do movimento, lista de usuários, seus recordes pessoais (maior valor), posição e data.

**Endpoint:** `GET /api/ranking/{movement_id}`

**Parâmetros URL:**
- `movement_id`: ID do movimento (obrigatório)
    - 1 = Deadlift
    - 2 = Back Squat
    - 3 = Bench Press

**Exemplo de Resposta:**
```json
{
    "movement": "Back Squat",
    "ranking": [
        {
            "position": 1,
            "user_name": "Joao",
            "value": 130.0,
            "date": "2021-01-03 00:00:00"
        },
        {
            "position": 1,
            "user_name": "Jose",
            "value": 130.0,
            "date": "2021-01-03 00:00:00"
        },
        {
            "position": 2,
            "user_name": "Paulo",
            "value": 125.0,
            "date": "2021-01-03 00:00:00"
        }
    ]
}
```

## 📁 Estrutura do Projeto

```
├── src
│   ├── app
│   │   ├── Http
│   │   │   └── Controllers
│   │   │       └── RankingController.php
│   │   ├── Models
│   │   │   ├── Movement.php
│   │   │   ├── PersonalRecord.php
│   │   │   └── User.php
│   │   └── Services
│   │       └── RankingService.php
│   ├── database
│   │   ├── migrations
│   │   │   ├── 2025_02_09_195855_database_creation.php
│   │   └── seeders
│   │       ├── MovementSeeder.php
│   │       ├── PersonalRecordSeeder.php
│   │       └── UserSeeder.php
```