# Welcome to Simple Blog CMS 👋

> **Simple Blog CMS** adalah aplikasi manajemen konten sederhana berbasis Laravel yang memungkinkan pengguna untuk mengelola artikel (title, description, author) serta role & permission.  
Project ini dibuat sebagai bagian dari Capstone Project Hacktiv8 dengan kategori **CRUD Application**.

## 🛠️ Technologies Used
- **Laravel 11** – Framework utama backend & frontend (Blade UI)
- **MySQL** – Database relasional
- **Spatie Laravel Permission** – Manajemen Role & Permission
- **Composer** – Dependency management PHP
- **NPM (Vite)** – Asset bundler & frontend build

## ✨ Features
- **Authentication** (Laravel default auth)
- **Role & Permission Management** menggunakan Spatie
- **CRUD Permission, Role, User, Artikel(Sederhana)** (Create, Read, Update, Delete)
- **Dashboard sederhana** dengan Blade untuk mengelola data

  
## Install

```sh

```bash
# 1. Clone repository
git clone https://github.com/username/simple-blog-cms.git
cd simple-blog-cms

# 2. Install dependencies
composer install
npm install && npm run dev

# 3. Copy environment file
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Konfigurasi database di file .env, lalu jalankan migrasi
php artisan migrate --seed

# 6. (Opsional) Publish konfigurasi Spatie Permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate

# 7. Jalankan aplikasi
php artisan serve
```

## Author

👤 **karinasekarpu**

* Github: [@karinasekar22](https://github.com/karinasekar22)

## Show your support

Give a ⭐️ if this project helped you!


***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
