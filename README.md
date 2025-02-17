## Overview

A backend server with an API for customers run in Laravel 11

A frontend web app that fetching data from the API and displays it in a table

## Requirements
- **PHP**: Version **8** is used for optimal performance in both development and production environments.
- **MySQL**: Version **9** or **Docker compose** to host a MySQL container.
- **Yarn** or **npm**, personal preference for frontend app.
- **Docker Desktop** with **Docker compose** for MySQL and managing MySQL container
- **Composer** 

## Getting Started

First, clone the respository and install dependencies:

```bash
clone https://github.com/griessel-jc/catch-design-test-apps
cd catch-design-test-apps
```

Copy over env variables and change the Database variables accordingly
```bash
cd catchdesign-api
cp .env.example .env

DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=laravel
DB_USERNAME=catchUser
DB_PASSWORD=secret
DB_ROOT_PASSWORD=secret
```

Setup MySQL docker container, it will map the port to 3307 by default to avoid conflict with local MySQL.

```bash
docker compose -f compose.dev.yml up -d
```

Install dependancies for Laravel and initiate app key.

```bash
composer install
php artisan key:generate
```

Initiate migrations and seed database with customer.csv

```bash
php artisan migrate
php artisan db:seed CustomerSeeder
```

Start backend API server, it will be available at http://localhost:8000/api by default

```bash
php artisan serve
```

Open a seperate terminal, install frontend web app dependancies, copy over environment variable and start dev, it will be available at http://localhost:3000 by default

```bash
cd ../catchdesign-web-app
cp .env.next-example .env
yarn install
yarn dev
```

## API
Ideally setup a repository interface but for demonstration purpose this is a basic API that allows web or mobile to access data.