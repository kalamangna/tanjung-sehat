<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-primary-50">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-16">
        <div class="md:w-1/2">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Apotik Tanjung Sehat</h1>
            <p class="text-lg text-gray-600 mb-8">Apotik kami menyediakan obat-obatan lengkap, vitamin, dan alat kesehatan yang terjamin asli. Apoteker kami siap membantu memberikan informasi obat yang Anda butuhkan.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://wa.me/<?= $settings['whatsapp_number'] ?? '' ?>?text=Halo%20Apotik%20Tanjung%20Sehat,%20saya%20mau%20tanya%20obat" class="bg-primary-600 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:bg-primary-700 transition-all flex items-center justify-center">
                    <i class="fab fa-whatsapp mr-2"></i> Tanya Obat
                </a>
            </div>
        </div>
        <div class="md:w-1/2">
            <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=1000" alt="Apotik Tanjung Sehat" class="rounded-3xl shadow-2xl">
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-16">Kenapa Pilih Apotik Kami?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center">
                <div class="w-20 h-20 bg-secondary-100 text-secondary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-double text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Obat Asli</h3>
                <p class="text-gray-600">Semua obat kami berasal dari distributor resmi, jadi Anda tidak perlu khawatir soal keasliannya.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-user-nurse text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Konsultasi Apoteker</h3>
                <p class="text-gray-600">Bingung soal dosis atau cara pakai? Apoteker kami siap menjelaskan dengan ramah.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-truck-medical text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Bisa Antar</h3>
                <p class="text-gray-600">Sakit dan tidak bisa keluar? Kami bisa antarkan obat ke rumah Anda (khusus area Makassar).</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
