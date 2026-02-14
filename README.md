# Klinik & Apotik Tanjung Sehat - Website Template

Sistem platform website klinik dan apotek yang skalabel, dibangun dengan CodeIgniter 4 dan Tailwind CSS.

## Fitur Utama
- **Arsitektur MVC Bersih**: Pemisahan logika frontend dan admin yang terstruktur.
- **RBAC (Role-Based Access Control)**: Sistem hak akses berbasis izin (Permission-based) dengan 3 role bawaan: Superadmin, Admin, dan Blog Editor.
- **Lokalisasi Penuh**: Menggunakan istilah medis dan navigasi Bahasa Indonesia yang simpel dan profesional.
- **Strategi Gambar Fail-Safe**: Integrasi otomatis dengan placeholder Picsum dan fallback sistem jika gambar gagal dimuat.
- **Dashboard Admin Lengkap**: Kelola Layanan, Dokter, Galeri, Testimoni, Blog, Pengguna, dan Pengaturan Situs.
- **Optimasi SEO**: Sitemap.xml otomatis, Robots.txt, dan skema JSON-LD MedicalOrganization.
- **Logging Aktivitas**: Mencatat setiap aksi administratif untuk audit keamanan.

## Teknologi
- **Framework:** CodeIgniter 4.7.0
- **CSS:** Tailwind CSS v3 (Compiled)
- **Database:** MySQL
- **Icons:** Font Awesome 6
- **Images:** Lorem Picsum (Placeholder)

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
   npm run build:css
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
- **Blog Editor**: Hanya mengelola Blog dan Kategori Artikel.
