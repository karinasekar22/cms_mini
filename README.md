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

  
## Installation

# 1. Clone repository
```bash
git clone https://github.com/karinasekar22/cms_mini.git
cd simple-blog-cms
```

# 2. Install dependencies
```bash
composer install
npm install && npm run dev
```

# 3. Copy environment file
```bash
cp .env.example .env
```


# 4. Konfigurasi database di file .env, lalu jalankan migrasi
```bash
php artisan migrate
```


# 5. (Opsional) Publish konfigurasi Spatie Permission
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```


# 6. Jalankan aplikasi
```bash
php artisan serve
```
Aplikasi akan berjalan di http://127.0.0.1:8000.

## 🤖 AI Support Explanation

Selama proses pengembangan, AI digunakan untuk:

- Membantu menyusun struktur project dan best practice Laravel.

- Menjelaskan implementasi CRUD & role permission dengan Spatie.

- Membuat dokumentasi README.md dengan format yang sesuai aturan.

AI hanya digunakan pada fase pengembangan dan dokumentasi, tidak termasuk dalam produk akhir.

## Author

👤 **karinasekarpu**

* Github: [@karinasekar22](https://github.com/karinasekar22)

