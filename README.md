# Bersih.in Laundry

![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![MySQL](https://img.shields.io/badge/MySQL-Ready-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

Sistem manajemen laundry berbasis web. Bersih.in membantu pelanggan melakukan transaksi laundry dengan lebih mudah, sementara admin dapat mengelola layanan, transaksi, pegawai, dan memantau aktivitas laundry melalui dashboard.

## Navigasi

- [Bersih.in Laundry](#bersihin-laundry)
    - [Navigasi](#navigasi)
    - [Tautan Project](#tautan-project)
    - [Tentang Project](#tentang-project)
    - [Preview Singkat](#preview-singkat)
    - [Fitur](#fitur)
        - [Untuk Pelanggan](#untuk-pelanggan)
        - [Untuk Admin](#untuk-admin)
        - [Sistem](#sistem)
    - [Status Project](#status-project)
    - [Batasan](#batasan)
    - [Tech Stack](#tech-stack)
    - [Konsep yang Digunakan](#konsep-yang-digunakan)
    - [Instalasi](#instalasi)
    - [Struktur Database](#struktur-database)
    - [Penutup](#penutup)

## Tautan Project

- Website: https://pweb-production-3c59.up.railway.app
- Repository: https://github.com/nevvaandnii/PWEB
- Laporan: Proposal Akhir PWEB-1.pdf

## Tentang Project

Bersih.in merupakan sistem manajemen laundry berbasis web yang dirancang untuk membantu proses pencatatan transaksi, pengelolaan layanan laundry, dan pengelolaan pegawai secara lebih efisien.

Sistem menyediakan dashboard interaktif, pencarian transaksi berbasis AJAX, pengaturan preferensi tampilan menggunakan cookie, serta informasi cuaca operasional laundry yang diperoleh melalui API cuaca.

## Preview Singkat

| Area | Yang Bisa Dilakukan |
|--------|--------|
| Pelanggan | Melakukan transaksi laundry dan melihat informasi layanan |
| Admin | Mengelola transaksi, layanan, dan pegawai |
| Sistem | Menyimpan preferensi, menampilkan cuaca, dan statistik transaksi |

Alur sederhana:

```text
Pelanggan datang
    -> memilih layanan
    -> transaksi dibuat
    -> admin memproses laundry
    -> transaksi selesai
```

## Fitur

### Untuk Pelanggan

- Login ke sistem.
- Melihat informasi layanan laundry.
- Melakukan transaksi laundry.
- Melihat status transaksi.
- Mengatur preferensi tampilan.

### Untuk Admin

- Dashboard monitoring.
- Mengelola data layanan.
- Mengelola data transaksi.
- Mengelola data pegawai.
- Melihat statistik transaksi.
- Melakukan pencarian data transaksi.

### Sistem

- Login dan autentikasi.
- Dashboard statistik menggunakan Chart.js.
- Integrasi API cuaca wilayah Jember.
- AJAX Search transaksi.
- Penyimpanan preferensi menggunakan Cookie.
- Role admin dan user.
- Responsive design.

## Status Project

| Bagian | Status |
|---------|---------|
| Login | Tersedia |
| Dashboard | Tersedia |
| CRUD Transaksi | Tersedia |
| CRUD Layanan | Tersedia |
| CRUD Pegawai | Tersedia |
| API Cuaca | Tersedia |
| AJAX Search | Tersedia |
| Cookie Preference | Tersedia |

## Tech Stack

| Bagian | Teknologi |
|---------|---------|
| Backend | PHP, Laravel 12 |
| Frontend | Blade, CSS, JavaScript |
| Database | MySQL |
| Chart | Chart.js |
| API | wttr.in Weather API |
| Hosting | Railway |

## Konsep yang Digunakan

- MVC (Model View Controller)
- CRUD
- Migration
- Authentication
- AJAX
- Cookie
- RESTful Route
- API Integration
- Responsive Web Design

## Instalasi

```bash
git clone https://github.com/nevvaandnii/PWEB.git

cd BersihIn

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

## Struktur Database

Tabel utama:

| Tabel | Fungsi |
|---------|---------|
| users | Menyimpan data akun pengguna |
| transaksis | Menyimpan data transaksi laundry |
| layanans | Menyimpan layanan laundry |
| pegawais | Menyimpan data pegawai |

Relasi:

```text
layanans
    ↓
transaksis

users
    ↓
sistem login
```

## Penutup

Bersih.in Laundry dibuat untuk membantu proses pengelolaan laundry menjadi lebih cepat, terorganisir, dan mudah digunakan. Sistem ini menerapkan konsep MVC Laravel, AJAX, Cookie, dan API sehingga dapat menjadi media pembelajaran pengembangan web modern.
