# Pelatihan Web Development - Sistem Manajemen Perpustakaan (UPI)

Aplikasi web berbasis **Laravel** dengan template **SB Admin 2** untuk pelatihan web development. Proyek ini mencakup fitur CRUD lengkap untuk manajemen Pengguna (**User**), Buku (**Book**), dan Transaksi Peminjaman (**Transaction**).

---

## Prasyarat Sistem (Prerequisites)

Sebelum menjalankan proyek di komputer lokal, pastikan telah terinstall:
- **PHP** >= 8.2 (disarankan PHP 8.3)
- **Composer** >= 2.x
- **Node.js** >= 18.x & **NPM**
- **Database**: MySQL / MariaDB (atau SQLite)
- **Git**

---

## Panduan Instalasi Lokal (Setup & Run)

Ikuti langkah-langkah berikut setelah melakukan clone repository:

### 1. Clone Repository
```bash
git clone <URL_REPOSITORY_ANDA>
cd pelatihan-upi
```

### 2. Install Dependensi PHP
Jalankan composer untuk mengunduh semua vendor package:
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pelatihan_webdev
DB_USERNAME=root
DB_PASSWORD=
```
> **Catatan:** Pastikan database `pelatihan_webdev` sudah dibuat terlebih dahulu di MySQL/phpMyAdmin (atau sesuaikan dengan nama database lokal Anda).

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi Database
Jalankan migrasi untuk membuat tabel `users`, `books`, dan `transactions`:
```bash
php artisan migrate
```

*(Opsional)* Jika ingin menambahkan data seeder awal:
```bash
php artisan db:seed
```

### 6. Install & Build Asset Frontend
```bash
npm install
npm run build
```

### 7. Jalankan Server Lokal
Jalankan server development Laravel:
```bash
php artisan serve
```

Aplikasi dapat diakses melalui browser pada URL:
👉 **[http://localhost:8000](http://localhost:8000)** atau **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## Fitur & Modul Utama

| Modul | URL Route | Deskripsi |
|---|---|---|
| **Dashboard** | `/` | Tampilan dashboard template SB Admin 2 |
| **Users** | `/users` | CRUD Pengguna (Nama, Email, Password) & shortcut Transaksi per User |
| **Buku** | `/books` | CRUD Buku (Judul, Penulis, Penerbit, Tahun, Deskripsi) |
| **Transaksi** | `/transactions` | CRUD Transaksi Peminjaman Buku dengan filter berdasarkan User |

---

## Perintah Bermanfaat (Troubleshooting)

- **Reset / Refresh Database dari awal:**
  ```bash
  php artisan migrate:fresh
  ```
- **Membersihkan cache aplikasi & konfigurasi:**
  ```bash
  php artisan optimize:clear
  ```
- **Melihat daftar seluruh route yang terdaftar:**
  ```bash
  php artisan route:list
  ```
