<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-primary-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Kami</h1>
        <p class="text-lg text-primary-100 max-w-2xl mx-auto">Mengenal lebih dekat Klinik & Apotik Tanjung Sehat, sahabat kesehatan keluarga Anda.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2">
                <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80&w=1000" alt="Klinik Tanjung Sehat" class="rounded-3xl shadow-2xl">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Visi & Misi</h2>
                <div class="space-y-8">
                    <div>
                        <h3 class="text-xl font-bold text-primary-600 mb-2 flex items-center">
                            <span class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center mr-3 text-sm font-bold">01</span>
                            Visi
                        </h3>
                        <p class="text-gray-600 leading-relaxed italic">"Menjadi klinik keluarga pilihan utama di Makassar yang terpercaya dan bersahabat."</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-primary-600 mb-2 flex items-center">
                            <span class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center mr-3 text-sm font-bold">02</span>
                            Misi
                        </h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-3">
                            <li>Memberikan layanan medis yang ramah dan profesional.</li>
                            <li>Menyediakan obat-obatan lengkap dan asli.</li>
                            <li>Mengedukasi masyarakat tentang pola hidup sehat.</li>
                            <li>Terus meningkatkan fasilitas demi kenyamanan pasien.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
