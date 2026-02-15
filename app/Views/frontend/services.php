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
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all group text-center">
                <h3 class="text-2xl font-bold mb-4 text-gray-900"><?= $service['title'] ?></h3>
                <p class="text-gray-600">
                    <?= $service['description'] ?? 'Layanan kesehatan profesional untuk Anda.' ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>