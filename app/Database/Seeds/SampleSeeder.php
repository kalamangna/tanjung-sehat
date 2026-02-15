<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SampleSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->getPlatform() === 'MySQLi') {
            $this->db->query('SET FOREIGN_KEY_CHECKS=0;');
        }

        // 1. Roles & Permissions (Core Setup)
        $this->db->table('roles')->truncate();
        $this->db->table('permissions')->truncate();
        $this->db->table('role_permissions')->truncate();
        $this->db->table('users')->truncate();
        $this->db->table('settings')->truncate();

        $roleData = [['id' => 1, 'name' => 'Superadmin'], ['id' => 2, 'name' => 'Admin'], ['id' => 3, 'name' => 'Blog Editor']];
        $this->db->table('roles')->insertBatch($roleData);
        $permData = [
            ['id' => 1, 'name' => 'manage_services'], ['id' => 2, 'name' => 'manage_doctors'],
            ['id' => 3, 'name' => 'manage_blog'], ['id' => 4, 'name' => 'manage_gallery'],
            ['id' => 5, 'name' => 'manage_settings'], ['id' => 6, 'name' => 'manage_users'],
            ['id' => 7, 'name' => 'manage_testimonials']
        ];
        $this->db->table('permissions')->insertBatch($permData);
        foreach(range(1, 7) as $id) $this->db->table('role_permissions')->insert(['role_id' => 1, 'permission_id' => $id]);

        model('UserModel')->insert(['username' => 'admin', 'email' => 'admin@tanjungsehat.com', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'name' => 'Admin Utama', 'role_id' => 1]);
        $settings = [
            ['key' => 'site_name', 'value' => 'Klinik & Apotek Tanjung Sehat'],
            ['key' => 'site_tagline', 'value' => 'Sehat Lebih Dekat, Lebih Cepat.'],
            ['key' => 'whatsapp_number', 'value' => '08123456789'],
            ['key' => 'google_maps_url', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127158.21404092414!2d119.34969446864455!3d-5.14300302525547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db9f58356391497%3A0xf6f6918664b38d7c!2sMakassar%2C%20Makassar%20City%2C%20South%20Sulawesi!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid'],
            ['key' => 'contact_address', 'value' => 'Jl. Tanjung Alang No. 12, Makassar'],
            ['key' => 'contact_email', 'value' => 'info@tanjungsehat.com'],
        ];
        foreach ($settings as $s) $this->db->table('settings')->insert($s);

        // 2. Layanan (6 Data - Balanced for 3-col grid)
        $this->db->table('services')->truncate();
        $srvData = [
            ['title' => 'Poli Umum', 'icon' => 'user-md'],
            ['title' => 'Apotek', 'icon' => 'pills'],
            ['title' => 'Lab Medik', 'icon' => 'microscope'],
            ['title' => 'Poli Gigi', 'icon' => 'tooth'],
            ['title' => 'Poli Anak', 'icon' => 'baby'],
            ['title' => 'Fisioterapi', 'icon' => 'walking'],
        ];
        foreach ($srvData as $index => $s) {
            $this->db->table('services')->insert([
                'title' => $s['title'], 'slug' => url_title($s['title'], '-', true), 'icon' => $s['icon'],
                'image' => "https://picsum.photos/seed/srv-{$index}/800/450",
                'description' => 'Layanan ' . $s['title'] . ' profesional untuk keluarga Anda.',
                'content' => '<p>Detail layanan lengkap ' . $s['title'] . ' tersedia setiap hari.</p>',
                'is_active' => 1
            ]);
        }

        // 3. Dokter (8 Data - Balanced for 4-col grid)
        $this->db->table('doctors')->truncate();
        $specialties = ['Penyakit Dalam', 'Anak', 'Umum', 'Gigi', 'Kandungan', 'Kulit', 'Bedah', 'Saraf'];
        foreach (range(1, 8) as $i) {
            $this->db->table('doctors')->insert([
                'name' => 'dr. Dokter Nama ' . $i, 'slug' => 'dr-dokter-' . $i, 'specialty' => $specialties[$i-1],
                'image' => "https://picsum.photos/seed/doc-{$i}/600/800",
                'biography' => 'Dokter ahli berpengalaman di bidangnya.', 'schedule' => 'Senin - Jumat', 'is_active' => 1
            ]);
        }

        // 4. Blog (6 Data - Balanced for 3-col grid)
        $this->db->table('blog_categories')->truncate();
        $this->db->table('blogs')->truncate();
        $catId = $this->db->table('blog_categories')->insert(['name' => 'Kesehatan', 'slug' => 'kesehatan']);
        foreach (range(1, 6) as $i) {
            $this->db->table('blogs')->insert([
                'category_id' => $catId, 'title' => 'Tips Sehat Bagian ' . $i, 'slug' => 'tips-sehat-' . $i,
                'summary' => 'Ringkasan tips kesehatan yang bermanfaat bagi Anda.',
                'content' => '<p>Konten edukasi kesehatan lengkap.</p>',
                'image' => "https://picsum.photos/seed/blog-{$i}/1000/625",
                'status' => 'published', 'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        // 5. Galeri (9 Data - Balanced for 3-col grid)
        $this->db->table('gallery')->truncate();
        foreach (range(1, 9) as $i) {
            $this->db->table('gallery')->insert([
                'title' => 'Fasilitas ' . $i, 'category' => 'Klinik',
                'image' => "https://picsum.photos/seed/gal-{$i}/800/800"
            ]);
        }

        // 6. Testimoni (3 Data - Balanced for 3-col grid)
        $this->db->table('testimonials')->truncate();
        foreach (range(1, 3) as $i) {
            $this->db->table('testimonials')->insert([
                'name' => 'Pasien ' . $i, 'position' => 'Umum', 'content' => 'Layanan sangat memuaskan.', 'rating' => 5, 'is_active' => 1
            ]);
        }

        if ($this->db->getPlatform() === 'MySQLi') {
            $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}