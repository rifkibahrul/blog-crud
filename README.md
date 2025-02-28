-   Muhammad Rifki Bahrul Ulum
  
Proyek ini menggunakan Laravel 10.

## Laravel Dependecies Instalation

```bash
  composer install
```

## Setting Database

- Lakukan generate file .env

```bash
  cp .env.example .env
```

- Generate APP_KEY jika diperlukan

```bash
  php artisan key:generate
```

- Lakukan migrasi pada database menggunakan ORM

```bash
  php artisan migrate
```

## Launch Seeder

Jalankan perintah ini untuk memasukan data akun dari seeder

```bash
  php artisan db:seed --class=UserSeeder
```

## Running Website Local

Untuk menjalankan program, ikuti perintah 

```bash
  php artisan serve
```
