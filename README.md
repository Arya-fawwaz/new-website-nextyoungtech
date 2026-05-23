# 🌌 Next Young Tech - Premium Web Design & 3D Development Agency Portal

Selamat datang di proyek **Next Young Tech Technology**! Ini adalah platform web modern kelas dunia yang dibangun menggunakan arsitektur **Laravel 11**, styling **Tailwind CSS v4**, dan interaktivitas **Three.js WebGL**.

Situs ini bukan sekadar web profil perusahaan biasa, melainkan sebuah portal bisnis interaktif lengkap yang dirancang khusus untuk memikat calon klien yang ingin membuat website premium kustom, sistem aplikasi, maupun teknologi 3D imersif.

---

## 🚀 1. Apa sih Website ini sebenarnya? (Deskripsi & Filosofi)

**Next Young Tech** adalah website representasi resmi untuk sebuah agensi pengembangan teknologi digital (*Web Development & Design Agency*). 

Website ini dirancang dengan gaya **Cyberpunk-Space Futurism** & **Glassmorphism**, yang menggabungkan elemen luar angkasa imersif dengan keindahan kaca buram modern. Tujuannya adalah untuk mendemonstrasikan keahlian teknis tingkat tinggi agensi secara langsung di hadapan pengunjung sejak detik pertama mereka memuat halaman.

---

## 👥 2. Siapa Target Penggunanya? (Target Audiens)

Aplikasi portal ini memiliki 3 kelompok pengguna utama:

1.  **Pengunjung Umum & Calon Klien**:
    *   Melihat profil agensi dan fitur premium.
    *   Melakukan konsultasi instan ke WhatsApp sales.
    *   Mengirim formulir inquiries/pertanyaan secara langsung.
2.  **Klien Terdaftar (Registered Users)**:
    *   Dapat masuk (*login*) secara aman menggunakan email biasa atau akun Google asli.
    *   Menggunakan fitur **Kalkulator Estimasi Biaya Interaktif** untuk mensimulasikan harga pembuatan website impian mereka.
    *   Mengirimkan ulasan/testimoni terverifikasi yang langsung tampil pada halaman utama secara dinamis.
3.  **Administrator & Tim Sales (Admin Portal)**:
    *   Mengelola seluruh pesan inquiries masuk dari calon klien.
    *   Mengelola data kalkulasi biaya yang dikirim oleh pengguna.
    *   Mengubah status tindak lanjut prospek klien (*New* ➡️ *Contacted* ➡️ *Completed*).
    *   Melakukan tutup buku bulanan dan mengunduh laporan Excel/CSV otomatis.
    *   Mengatur paket layanan (*Layanan CRUD*) dan daftar pengguna (*User CRUD*).

---

## ✨ 3. Fitur Utama Website

*   **3D Cosmic Background (Beranda)**: Kanvas partikel 3D interaktif berbasis WebGL (Three.js) yang berputar dinamis mengikuti koordinat pergerakan kursor mouse pengguna.
*   **Astronaut Loader Screen**: Halaman pemuatan portal (*loading screen*) bertema ruang angkasa dengan visual astronot melayang yang disaring pemindai laser neon digital.
*   **Kalkulator Estimasi Biaya Interaktif**: Sistem simulasi biaya proyek real-time di mana klien dapat memilih jenis website, jumlah halaman, dan add-on premium, lalu menyimpannya dalam bentuk kuitansi digital.
*   **Google Auth Hibrida (Smart Mode)**: Sistem login Google yang canggih. Jika API Google client-ID belum terpasang di `.env`, sistem secara cerdas beralih ke *Mode Demonstrasi / Simulasi* berpanduan wizard interaktif tanpa memblokir akses pengguna.
*   **Majestic Dashboard Admin**: Panel manajemen ungu gelap futuristik yang dilengkapi statistik dinamis berbentuk grafik Donat & Grafik Batang (SVG), tabel data interaktif, dan ekspor pembukuan instan.
*   **WhatsApp CRM Integration**: Tombol melayang instan serta pengalihan otomatis setelah mengisi estimasi biaya atau ulasan langsung ke WhatsApp konsultan sales dengan pesan yang sudah terformat rapi.
*   **Dynamic Theme Toggle**: Dukungan mode gelap (*default*) dan mode terang mewah yang dapat diganti instan di seluruh halaman.

---

## 🛠️ 4. Arsitektur & Tumpukan Teknologi (Tech Stack)

*   **Backend Core**: Laravel 11.x (PHP 8.2+)
*   **Frontend Styling**: Tailwind CSS v4.x (Vite-powered) & Custom Glassmorphism CSS
*   **Interactive Graphics**: Three.js WebGL & FontAwesome 6 Pro Icons
*   **Database**: SQLite (Lokal / Pengujian) & MySQL/PostgreSQL (Siap Produksi/Cloud)
*   **Authentication**: Laravel Session & Laravel Socialite (Google OAuth 2.0)
*   **Deployment Target**: Vercel Serverless Platform

---

## 🖥️ 5. Cara Menjalankan Proyek secara Lokal

Ikuti panduan berikut untuk menjalankan proyek ini di laptop Anda:

1.  **Clone / Buka Proyek** di terminal.
2.  **Instalasi Dependensi PHP & Node.js**:
    ```bash
    composer install
    npm install
    ```
3.  **Salin Konfigurasi Environment**:
    Salin file `.env.example` menjadi `.env` lalu buat database SQLite kosong:
    ```bash
    cp .env.example .env
    ```
4.  **Buat Database & Jalankan Migrasi + Seeder**:
    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```
    *Seeder akan otomatis membuat akun Admin bawaan untuk Anda.*

5.  **Jalankan Server Lokal**:
    Buka dua tab terminal dan jalankan perintah berikut:
    *   **Terminal 1 (PHP Server)**:
        ```bash
        php artisan serve
        ```
    *   **Terminal 2 (Vite Assets compiler)**:
        ```bash
        npm run dev
        ```
6.  **Akses Aplikasi**:
    *   **Website**: Buka browser ke [http://127.0.0.1:8000](http://127.0.0.1:8000)
    *   **Portal Admin**: Akses ke [http://127.0.0.1:8000/admin/login](http://127.0.0.1:8000/admin/login)
        *   **Email Admin Bawaan**: `admin@nextyoungtech.com`
        *   **Password Admin Bawaan**: `admin123`

---

## ☁️ 6. Cara Deploy ke Vercel (Produksi Global)

Aplikasi ini sudah dikonfigurasi dengan `vercel.json` dan `api/index.php` agar dapat dideploy ke Vercel secara gratis dan bisa diakses dari **jaringan internet mana saja secara global**.

*   Petunjuk langkah-demi-langkah pendaftaran database MySQL remote gratis, pengaturan variabel `.env` di Vercel Dashboard, dan inisialisasi tabel dapat Anda pelajari lengkap di berkas panduan khusus:
    👉 **[deployment_guide.md](./deployment_guide.md)** (Dibuat otomatis di dalam sistem Anda).
