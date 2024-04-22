# Tech Test - EverlyRusher 2024

> Look for your bests recipes.

Esta es la prueba técnica de EverlyRusher 2024, basado en un proyecto realizado
en Laravel que consiste en un buscador de recetas muy básico.

El buscador presenta un campo de entrada donde puedes ingresar una palabra o
frase clave, y buscará en los títulos y cuerpos de todas las recetas,
devolviendo un listado de recetas en la misma página.

## Requirements

* docker
* docker-compose

## How to run

```bash
# After cloning the project
cd ./tech-test

# Add the project to hosts file
sudo sh -c "echo '127.0.0.1 tech-test.local' >> /etc/hosts"

# Install sail
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

# Setup envs
cp .env.example .env

# Set alias sail
alias sail="./vendor/bin/sail"

# Start all containers from 'docker-compose.yml' in background
sail up -d

# Migrations
sail artisan migrate --seed

# Generate key
sail artisan key:generate

# Install NPM dependencies
sail bun install

# Build js and css assets
sail bun run build

# Pass tests
sail test
```

## Dusk

Dusk install
```php
sail artisan dusk:install
```

Run dusk tests
```php
sail dusk
```

## NOTES FOR FUZZY FINDER
Install via composer
```php

sail composer require laravel/scout
sail composer require meilisearch/meilisearch-php
```

add key for meilisearch
```
MEILISEARCH_KEY=masterKey
```

add recipes to scout
```
sail php artisan scout:import "App\Models\Recipe"
```

