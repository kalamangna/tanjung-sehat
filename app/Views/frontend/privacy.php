<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <h1 class="text-3xl font-bold mb-8 text-gray-900">Kebijakan Privasi</h1>
        <div class="prose prose-primary max-w-none text-gray-700">
            <p>Kami sangat menjaga privasi Anda. Halaman ini menjelaskan bagaimana kami mengelola data pribadi yang Anda berikan kepada Klinik & Apotek Tanjung Sehat.</p>
            
            <h3 class="text-xl font-bold mt-8 mb-4">Data yang Kami Kumpulkan</h3>
            <p>Kami mengumpulkan info saat Anda mendaftar janji temu, mengisi formulir kontak, atau membeli obat. Data ini meliputi nama, nomor telepon, email, dan riwayat kesehatan singkat.</p>

            <h3 class="text-xl font-bold mt-8 mb-4">Kegunaan Data</h3>
            <p>Data Anda kami gunakan untuk:</p>
            <ul>
                <li>Memproses pendaftaran dokter.</li>
                <li>Menghubungi Anda terkait layanan atau pesanan.</li>
                <li>Meningkatkan kualitas pelayanan klinik.</li>
            </ul>

            <h3 class="text-xl font-bold mt-8 mb-4">Keamanan</h3>
            <p>Kami menjaga data Anda dengan sistem keamanan yang aman agar tidak disalahgunakan oleh pihak lain.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>