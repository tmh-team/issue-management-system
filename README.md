# Project Management System

## Installation

Clone the repo locally:

```
git clone https://github.com/tmh-team/project-management-system.git

cd project-management-system
```

Install PHP dependencies:

```
composer install
```

Install NPM dependencies:

```
npm install
```

Build assets:

```
npm run dev
```

Setup configuration:

```
cp .env.example .env
```

Generate application key:

```
php artisan key:generate
```

Create database and configure in `.env` file

eg.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management_system
DB_USERNAME=root
DB_PASSWORD=
```

Run database migrations:

```
php artisan migrate
```

Run database seeder:

```
php artisan db:seed
```

Run the dev server:

```
php artisan serve
```

Visit `localhost:8000` in your browser and login with:

- **Email:** admin@test.com
- **Password:** password

## Running tests

Run tests:

```
php artisan test
```
