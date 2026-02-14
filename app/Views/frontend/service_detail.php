<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<article class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <nav class="flex mb-8 text-sm text-gray-500" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="<?= base_url() ?>" class="hover:text-primary-600">Beranda</a></li>
                <li><i class="fas fa-chevron-right text-[10px]"></i></li>
                <li><a href="<?= base_url('services') ?>" class="hover:text-primary-600">Layanan</a></li>
                <li><i class="fas fa-chevron-right text-[10px]"></i></li>
                <li class="text-gray-900 font-medium"><?= $service['title'] ?></li>
            </ol>
        </nav>

        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8"><?= $service['title'] ?></h1>
        
        <?php 
            $image_src = $service['image'];
            if ($image_src && !filter_var($image_src, FILTER_VALIDATE_URL)) {
                $image_src = base_url('uploads/services/' . $image_src);
            }
        ?>
        <?php if ($image_src): ?>
            <img src="<?= $image_src ?>" alt="<?= $service['title'] ?>" class="w-full h-96 object-cover rounded-3xl mb-12 shadow-lg">
        <?php else: ?>
            <div class="w-full h-64 bg-primary-50 rounded-3xl mb-12 flex items-center justify-center">
                <i class="fas fa-<?= $service['icon'] ?? 'stethoscope' ?> text-8xl text-primary-200"></i>
            </div>
        <?php endif; ?>

        <div class="prose prose-lg max-w-none text-gray-700">
            <?= $service['content'] ?>
        </div>

        <div class="mt-16 p-8 bg-gray-50 rounded-3xl border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-8">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Butuh Layanan Ini?</h3>
                <p class="text-gray-600">Hubungi kami untuk tanya jadwal atau pendaftaran.</p>
            </div>
            <a href="https://wa.me/<?= $settings['whatsapp_number'] ?? '' ?>" class="bg-primary-600 text-white px-10 py-4 rounded-full font-bold shadow-lg hover:bg-primary-700 transition-all">
                Daftar Sekarang
            </a>
        </div>
    </div>
</article>

<?= $this->endSection() ?>
