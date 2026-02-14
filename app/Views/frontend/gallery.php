<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Galeri Fasilitas</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Foto fasilitas dan kegiatan pelayanan di Klinik & Apotik Tanjung Sehat.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (empty($items)): ?>
                <div class="col-span-full text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
                    <i class="fas fa-images text-6xl text-gray-100 mb-4"></i>
                    <p class="text-gray-400">Belum ada foto.</p>
                </div>
            <?php else: ?>
                <?php foreach ($items as $item): ?>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                    <div class="aspect-square overflow-hidden">
                        <img src="<?= get_image_url($item['image'], 'gallery') ?>" 
                             alt="<?= $item['title'] ?>" 
                             data-category="gallery"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900"><?= $item['title'] ?></h3>
                        <?php if ($item['category']): ?>
                            <span class="text-xs text-primary-600 font-medium uppercase"><?= $item['category'] ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>