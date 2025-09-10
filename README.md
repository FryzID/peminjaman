Peminjaman - Sistem Manajemen Peminjaman Barang
Ini adalah sebuah sistem manajemen peminjaman barang berbasis web yang dibangun menggunakan framework Laravel. Aplikasi ini memudahkan pengelolaan inventaris barang, pencatatan transaksi peminjaman, dan pelacakan riwayat peminjaman.
Fitur Utama
Manajemen Barang: Tambah, edit, hapus, dan lihat daftar barang yang tersedia.
Manajemen Peminjam: Mengelola data peminjam atau anggota.
Transaksi Peminjaman: Mencatat transaksi peminjaman dan pengembalian barang dengan mudah.
Riwayat Peminjaman: Melacak riwayat peminjaman untuk setiap barang dan peminjam.
Generate QR Code: Membuat QR code untuk setiap barang agar dapat diidentifikasi dan diproses dengan cepat menggunakan pemindai.
Login: Sistem otentikasi untuk mengamankan akses.
Instalasi
Clone repository ini:
code
Bash
git clone https://github.com/FryzID/peminjaman.git
Masuk ke direktori proyek:
code
Bash
cd peminjaman
Install dependencies dengan Composer:
code
Bash
composer install
Salin file .env.example menjadi .env:
code
Bash
cp .env.example .env
Buat application key baru:
code
Bash
php artisan key:generate
Konfigurasi koneksi database Anda di file .env:
code
Code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=user_database_anda
DB_PASSWORD=password_anda
Jalankan migrasi database untuk membuat tabel:
code
Bash
php artisan migrate
(Opsional) Jalankan seeder untuk mengisi data awal (termasuk akun admin):
code
Bash
php artisan db:seed
Jalankan server pengembangan:
code
Bash
php artisan serve
Aplikasi sekarang akan berjalan di http://localhost:8000.
Penggunaan Aplikasi
Login Awal
Jika Anda menjalankan database seeder pada langkah instalasi, sebuah akun admin default akan dibuat. Anda bisa login menggunakan kredensial berikut:
Email: admin@gmail.com
Password: password
Sangat disarankan untuk segera mengubah password setelah berhasil login demi keamanan.
Generate dan Penggunaan QR Code
Fitur ini bertujuan untuk mempercepat proses identifikasi barang dan transaksi.
Membuat QR Code:
Masuk ke menu manajemen barang.
Untuk setiap barang yang ditambahkan atau yang sudah ada, akan ada opsi untuk "Generate QR Code" atau "Cetak QR Code".
Setelah di-klik, sistem akan membuat gambar QR code unik yang berisi informasi atau ID dari barang tersebut.
Penggunaan QR Code:
Cetak QR code yang telah dibuat dan tempelkan pada barang fisik yang bersangkutan.
Saat akan melakukan transaksi peminjaman atau pengembalian, Anda dapat menggunakan pemindai QR (bisa menggunakan aplikasi di smartphone atau alat scanner) untuk memindai kode tersebut.
Hasil pindaian (biasanya berupa URL atau ID unik) dapat dimasukkan ke dalam sistem untuk langsung menuju ke halaman detail barang atau transaksi, sehingga mempercepat proses tanpa harus mencari barang secara manual.
Kontribusi
Kontribusi selalu diterima! Jika Anda ingin mengembangkan aplikasi ini, silakan fork repository ini dan buat pull request dengan perubahan atau penambahan fitur yang Anda buat.
Lisensi
Proyek ini tidak memiliki lisensi spesifik. Anda bebas menggunakan dan memodifikasinya sesuai kebutuhan.
