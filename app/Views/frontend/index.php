<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative bg-white pt-16 pb-32 overflow-hidden">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-12 md:mb-0 z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                <?= $settings['site_tagline'] ?? 'Sehat Lebih Dekat, Lebih Cepat.' ?>
            </h1>
            <p class="text-lg text-gray-600 mb-8 max-w-lg">
                Layanan kesehatan lengkap dengan dokter berpengalaman dan fasilitas modern untuk Anda dan keluarga.
            </p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="<?= base_url('contact') ?>" class="bg-primary-600 text-white px-8 py-4 rounded-full font-bold text-center hover:bg-primary-700 transition-all shadow-lg hover:shadow-xl">
                    Buat Janji
                </a>
                <a href="<?= base_url('services') ?>" class="bg-white text-gray-900 border-2 border-gray-200 px-8 py-4 rounded-full font-bold text-center hover:border-primary-600 hover:text-primary-600 transition-all">
                    Lihat Layanan
                </a>
            </div>
        </div>
        <div class="md:w-1/2 relative">
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-secondary-100 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-50"></div>
            <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=1000" alt="Klinik Tanjung Sehat" class="rounded-3xl shadow-2xl relative z-10 w-full object-cover h-[500px]">
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="bg-primary-600 py-12 -mt-16 relative z-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-white text-center">
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">10+</div>
                <div class="text-primary-100 text-sm">Tahun Pengalaman</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">15+</div>
                <div class="text-primary-100 text-sm">Dokter Ahli</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">24/7</div>
                <div class="text-primary-100 text-sm">Siap Melayani</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">50k+</div>
                <div class="text-primary-100 text-sm">Pasien Puas</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-primary-600 font-bold tracking-wider uppercase text-sm mb-3">Layanan Kami</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Solusi Kesehatan Lengkap</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 group">
                <div class="aspect-video overflow-hidden relative">
                    <img src="<?= get_image_url($service['image'], 'service') ?>" 
                         alt="<?= $service['title'] ?>" 
                         data-category="service"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-8">
                    <h4 class="text-xl font-bold mb-4"><?= $service['title'] ?></h4>
                    <p class="text-gray-600 mb-6 line-clamp-2">
                        <?= $service['description'] ?>
                    </p>
                    <a href="<?= base_url('services/' . $service['slug']) ?>" class="text-primary-600 font-semibold flex items-center group-hover:underline">
                        Info Lengkap <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?= base_url('services') ?>" class="inline-flex items-center text-gray-600 font-medium hover:text-primary-600">
                Lihat Semua Layanan <i class="fas fa-chevron-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>

<!-- About Preview -->
<section class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-16">
        <div class="md:w-1/2 relative">
            <img src="https://images.unsplash.com/photo-1512678080530-7760d81faba6?auto=format&fit=crop&q=80&w=1000" alt="Tim Medis" class="rounded-3xl shadow-xl w-full">
            <div class="absolute -bottom-8 -right-8 bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hidden md:block">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Terakreditasi</div>
                        <div class="text-sm text-gray-500">Resmi & Terpercaya</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:w-1/2">
            <h2 class="text-primary-600 font-bold tracking-wider uppercase text-sm mb-3">Tentang Kami</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Klinik Pilihan Keluarga Makassar</h3>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Klinik & Apotik Tanjung Sehat hadir memberikan layanan kesehatan yang ramah, cepat, dan terjangkau. Kami siap membantu Anda dan keluarga tetap sehat dengan fasilitas yang lengkap dan nyaman.
            </p>
            <ul class="space-y-4 mb-8">
                <li class="flex items-center space-x-3">
                    <i class="fas fa-check-circle text-primary-500"></i>
                    <span class="font-medium">Fasilitas Modern</span>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fas fa-check-circle text-primary-500"></i>
                    <span class="font-medium">Apotik Lengkap</span>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fas fa-check-circle text-primary-500"></i>
                    <span class="font-medium">Dokter Berpengalaman</span>
                </li>
            </ul>
            <a href="<?= base_url('about') ?>" class="bg-gray-900 text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition-colors">
                Selengkapnya
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-secondary-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-secondary-600 font-bold tracking-wider uppercase text-sm mb-3">Apa Kata Mereka</h2>
        <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-16">Pengalaman Pasien Kami</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <?php foreach ($testimonials as $testi): ?>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex text-yellow-400 mb-4">
                    <?php for($i=0; $i<$testi['rating']; $i++): ?>
                        <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-600 italic mb-8">
                    "<?= $testi['content'] ?>"
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-200 rounded-full mr-4 flex items-center justify-center text-gray-400">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div>
                        <div class="font-bold"><?= $testi['name'] ?></div>
                        <div class="text-sm text-gray-500"><?= $testi['position'] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Latest Blog -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="text-primary-600 font-bold tracking-wider uppercase text-sm mb-3">Blog</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Tips Sehat & Berita</h3>
            </div>
            <a href="<?= base_url('blog') ?>" class="hidden md:block text-primary-600 font-semibold">
                Lihat Semua Artikel <i class="fas fa-arrow-right ml-2 text-sm"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($blogs as $blog): ?>
            <div class="group">
                <div class="relative overflow-hidden rounded-2xl mb-6 aspect-video bg-gray-100">
                    <img src="<?= get_image_url($blog['image'], 'blog') ?>" 
                         alt="<?= $blog['title'] ?>" 
                         data-category="blog"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary-600 text-white px-3 py-1 rounded-md text-xs font-bold uppercase">
                            <?= $blog['category_name'] ?>
                        </span>
                    </div>
                </div>
                <div class="text-sm text-gray-500 mb-3"><?= date('d M Y', strtotime($blog['created_at'])) ?></div>
                <h4 class="text-xl font-bold mb-3 group-hover:text-primary-600 transition-colors">
                    <a href="<?= base_url('blog/' . $blog['slug']) ?>"><?= $blog['title'] ?></a>
                </h4>
                <p class="text-gray-600 line-clamp-2">
                    <?= $blog['summary'] ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-12 bg-primary-600 relative overflow-hidden">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between relative z-10">
        <div class="text-white mb-8 md:mb-0">
            <h3 class="text-3xl font-bold mb-2">Butuh Bantuan?</h3>
            <p class="text-primary-100">Chat kami via WhatsApp untuk respon cepat.</p>
        </div>
        <a href="https://wa.me/<?= $settings['whatsapp_number'] ?? '' ?>" class="bg-white text-primary-600 px-10 py-4 rounded-full font-bold shadow-lg hover:bg-gray-100 transition-all flex items-center">
            <i class="fab fa-whatsapp mr-3 text-2xl"></i> Chat WhatsApp
        </a>
    </div>
</section>

<?= $this->endSection() ?>