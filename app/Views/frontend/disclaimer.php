<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <h1 class="text-3xl font-bold mb-8 text-gray-900">Disclaimer</h1>
        <div class="prose prose-primary max-w-none text-gray-700">
            <p>Info di website Klinik & Apotek Tanjung Sehat bersifat umum. Ini bukan pengganti saran medis, diagnosis, atau perawatan profesional.</p>
            
            <h3 class="text-xl font-bold mt-8 mb-4">Saran Medis</h3>
            <p>Selalu konsultasikan kondisi kesehatan Anda ke dokter. Jangan menunda pengobatan hanya karena info yang Anda baca di website ini.</p>

            <h3 class="text-xl font-bold mt-8 mb-4">Akurasi Info</h3>
            <p>Kami berusaha memberikan info terbaru, namun kami tidak menjamin 100% kelengkapan atau kecocokan info untuk setiap kondisi pasien.</p>

            <h3 class="text-xl font-bold mt-8 mb-4">Link Pihak Ketiga</h3>
            <p>Website ini mungkin punya link ke situs lain. Kami tidak bertanggung jawab atas isi dari situs-situs tersebut.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>