# Peminjaman - Sistem Manajemen Peminjaman Barang

Ini adalah sebuah sistem manajemen peminjaman barang berbasis web yang dibangun menggunakan framework Laravel. Aplikasi ini memudahkan pengelolaan inventaris barang, pencatatan transaksi peminjaman, dan pelacakan riwayat peminjaman.

## 📋 Fitur Utama

- **Manajemen Barang:** Tambah, edit, hapus, dan lihat daftar barang yang tersedia
- **Manajemen Peminjam:** Mengelola data peminjam atau anggota
- **Transaksi Peminjaman:** Mencatat transaksi peminjaman dan pengembalian barang dengan mudah
- **Riwayat Peminjaman:** Melacak riwayat peminjaman untuk setiap barang dan peminjam
- **Generate QR Code:** Membuat QR code untuk setiap barang agar dapat diidentifikasi dan diproses dengan cepat menggunakan pemindai
- **Login:** Sistem otentikasi untuk mengamankan akses

## 🚀 Panduan Instalasi

### Prasyarat

- Web Server (XAMPP, Laragon, dll.) dengan PHP & MySQL
- Composer terinstall secara global

### Langkah-langkah Instalasi

#### 1. Clone Repository

Buka terminal atau command prompt Anda, arahkan ke direktori root web server Anda (misalnya `htdocs` di XAMPP atau `www` di Laragon), dan jalankan perintah berikut:

```bash
git clone https://github.com/FryzID/peminjaman.git
cd peminjaman
```

#### 2. Konfigurasi Database (via phpMyAdmin)

Langkah ini akan menyiapkan database beserta semua tabel dan data awal yang diperlukan.

1. Buka **phpMyAdmin** dari panel kontrol web server Anda
2. Klik **"New"** di sidebar kiri untuk membuat database baru
3. Masukkan nama database, misalnya `peminjaman`, lalu klik **"Create"**
4. Pilih database `peminjaman` yang baru saja Anda buat
5. Klik pada tab **"Import"** di bagian atas halaman
6. Di bawah "File to import", klik **"Choose File"** dan cari file `peminjaman.sql` yang ada di dalam folder proyek yang Anda clone
7. Pastikan formatnya adalah **SQL**, lalu gulir ke bawah dan klik tombol **"Go"** atau **"Import"**

Tunggu hingga proses impor selesai. Database Anda sekarang sudah siap.

#### 3. Konfigurasi Aplikasi (via Command Line)

Kembali ke terminal Anda yang sudah berada di dalam direktori `peminjaman`, dan jalankan perintah-perintah berikut secara berurutan:

**Install dependencies PHP dengan Composer:**
```bash
composer install
```

**Buat file konfigurasi lingkungan (.env):**
```bash
cp .env.example .env
```

**Generate kunci aplikasi unik:**
```bash
php artisan key:generate
```

**Edit file .env** dan sesuaikan baris berikut agar cocok dengan konfigurasi database yang Anda buat di phpMyAdmin:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peminjaman      # Pastikan nama ini sama dengan yang Anda buat
DB_USERNAME=root            # Ganti jika username database Anda berbeda
DB_PASSWORD=                 # Ganti jika database Anda memiliki password
```

#### 4. Jalankan Aplikasi

Setelah semua konfigurasi selesai, jalankan server pengembangan Laravel:

```bash
php artisan serve
```

Aplikasi Anda sekarang akan berjalan dan dapat diakses di **http://127.0.0.1:8000**

## 📖 Penggunaan Aplikasi

### Login Awal

Database yang Anda impor sudah berisi data pengguna admin. Gunakan kredensial berikut untuk login pertama kali:

- **Email:** admin@mail.com
- **Password:** secret


### Generate dan Penggunaan QR Code

- **Membuat QR Code:** Di menu manajemen barang, setiap item memiliki opsi untuk **"Generate QR Code"**. Ini akan membuat gambar QR yang unik untuk barang tersebut
- **Penggunaan:** Cetak dan tempelkan QR code pada barang fisik. Saat melakukan transaksi, pindai kode ini dengan perangkat scanner untuk menemukan item di sistem secara instan tanpa perlu pencarian manual

## 🤝 Kontribusi

Kontribusi selalu diterima! Jika Anda ingin mengembangkan aplikasi ini, silakan fork repository ini dan buat *pull request* dengan perubahan atau penambahan fitur yang Anda buat.

## 📄 Lisensi

[Tambahkan informasi lisensi di sini]

## 📞 Kontak

[Tambahkan informasi kontak atau link ke profil GitHub Anda]

---

Dibuat dengan ❤️ menggunakan Laravel
