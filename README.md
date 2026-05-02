# 🚢 SeaVoyage
## 🧭 Deskripsi Proyek

**SeaVoyage** adalah platform pemesanan kapal berbasis web yang dirancang untuk memudahkan pengguna dalam melakukan penyewaan kapal dan mempermudah admin dalam mengelola data kapal, pemesanan, serta pengguna.

Aplikasi ini dibangun menggunakan **Laravel 12** dengan pendekatan **MVC (Model-View-Controller)** untuk menjaga struktur kode yang bersih dan terorganisir.

---

## ⚓ Nama Project

**SeaVoyage**

---

## 💡 Fitur Utama

### 🔹 Admin

* 🚢 **Ship Management** — Tambah, ubah, hapus, dan kelola data kapal.
* 📅 **Booking Approval** — Konfirmasi dan kelola pemesanan dari pengguna.
* 👤 **User Management** — Kelola akun pengguna (aktif/nonaktif).
* 🧾 **Invoices** — Cetak dan kelola invoice transaksi pemesanan.

### 🔹 User

* ⚓ **Browse Fleet** — Melihat daftar kapal yang tersedia untuk disewa.
* 📋 **Booking List** — Melihat daftar pemesanan aktif.
* 🕓 **Booking History** — Melihat riwayat pemesanan sebelumnya.
* ⛵ **Booking Ships** — Melakukan penyewaan kapal secara langsung.
* 🔔 **Notifications** — Menerima notifikasi status pemesanan dan pengembalian kapal.

---

## ⚙️ Teknologi yang Digunakan

| Kategori           | Teknologi                       |
| ------------------ | ------------------------------- |
| Framework          | Laravel 12                      |
| Bahasa Pemrograman | PHP 8.5, JavaScript             |
| Database           | MySQL                           |
| Frontend           | Blade, Bootstrap 5, FontAwesome |
| Version Control    | Git & GitHub                    |

---

## 🚀 Cara Menjalankan Project

1. **Install dependencies**

   ```bash
   composer install
   npm install && npm run dev
   ```

2. **Salin file environment**

   ```bash
   cp .env.example .env
   ```

3. **Konfigurasi database**
   Edit file `.env` dan ubah bagian berikut:

   ```
   DB_DATABASE=seavoyage_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate application key**

   ```bash
   php artisan key:generate
   ```

5. **Jalankan migrasi dan seeder (opsional)**

   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan server**

   ```bash
   php artisan serve
   ```

7. **Akses di browser:**
   👉 [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📁 Struktur Direktori Penting

```
├── app/
│   ├── Http/Controllers/      # Controller untuk user & admin
│   ├── Models/                # Model seperti Booking, Ship, User
│
├── database/
│   ├── migrations/            # Struktur tabel database
│   ├── seeders/               # Seeder data awal
│
├── public/
│   ├── storage/               # Link ke file image kapal
│
├── resources/
│   ├── views/                 # Blade templates (frontend)
│
├── routes/
│   ├── web.php                # Routing utama aplikasi
```

---

## 📜 Lisensi

Project ini dibuat untuk keperluan **bahan tugas** dalam pelatihan Pengembangan Aplikasi Web.