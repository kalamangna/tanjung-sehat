<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Layanan Kami</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Kami menyediakan layanan kesehatan lengkap untuk menjaga kesehatan Anda dan keluarga.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
            <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                <div class="aspect-video overflow-hidden relative">
                    <img src="<?= get_image_url($service['image'], 'service') ?>" 
                         alt="<?= $service['title'] ?>" 
                         data-category="service"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900"><?= $service['title'] ?></h3>
                    <p class="text-gray-600 mb-8 line-clamp-3"><?= $service['description'] ?></p>
                    <a href="<?= base_url('services/' . $service['slug']) ?>" class="inline-flex items-center text-primary-600 font-bold hover:translate-x-2 transition-transform">
                        Info Lengkap <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>