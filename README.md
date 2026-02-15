# Klinik & Apotek Tanjung Sehat - Website Template

Sistem platform website klinik dan apotek yang modern dan efisien, dibangun dengan CodeIgniter 4.7.0 dan Tailwind CSS 3.4.

## Fitur Utama
- **Arsitektur MVC Bersih**: Pemisahan logika frontend dan admin yang terstruktur dan mudah dimaintain.
- **Manajemen Dokter Terpadu**: Jadwal praktik harian mendetail dengan format waktu WITA dan integrasi WhatsApp.
- **Layanan Sederhana**: Pengelolaan daftar layanan kesehatan yang fokus pada ringkasan informasi yang esensial.
- **Blog & Edukasi**: Sistem penulisan artikel yang simpel dengan optimasi konten otomatis untuk SEO.
- **SEO & Social Metadata**: Optimasi penuh dengan Sitemap.xml otomatis, Robots.txt, skema JSON-LD (Organization & Article), Open Graph, dan Twitter Cards.
- **Lokalisasi Bahasa Indonesia**: Seluruh antarmuka admin dan pesan sistem menggunakan Bahasa Indonesia yang profesional.
- **RBAC (Role-Based Access Control)**: Sistem izin akses yang fleksibel untuk Superadmin, Admin, dan Editor.
- **Performa & Aksesibilitas**: Implementasi lazy loading pada gambar dan struktur HTML5 semantik.

## Teknologi
- **Backend:** CodeIgniter 4.7.0 (PHP 8.1+)
- **Frontend CSS:** Tailwind CSS v3.4 (Minified)
- **Database:** MySQL / MariaDB
- **Icons:** Font Awesome 6 (Free)
- **Images:** Lorem Picsum & Unsplash (Placeholder)

## Instruksi Instalasi

1. **Instalasi Dependensi**
   ```bash
   composer install
   npm install
   ```

2. **Konfigurasi Environment**
   - Salin `env` ke `.env`.
   - Sesuaikan kredensial database MySQL Anda di `.env`.
   - Pastikan direktori `writable` memiliki izin tulis.

3. **Inisialisasi Database**
   ```bash
   php spark migrate
   php spark db:seed SampleSeeder
   ```

4. **Kompilasi Aset**
   ```bash
   npm run build
   ```

5. **Jalankan Server**
   ```bash
   php spark serve
   ```
   Akses melalui `http://localhost:8080`

6. **Akses Admin**
   - URL: `http://localhost:8080/admin`
   - Akun Default: `admin` / `admin123`

## Struktur Izin RBAC
- **Superadmin**: Akses penuh ke seluruh sistem (termasuk Pengguna & Pengaturan).
- **Admin**: Mengelola Layanan, Dokter, Galeri, dan Testimoni.
- **Blog Editor**: Mengelola konten artikel Blog.