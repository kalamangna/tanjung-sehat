<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Dokter Kami</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Dokter profesional dan berpengalaman siap melayani kesehatan Anda dan keluarga.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($doctors as $doctor): ?>
            <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                <div class="aspect-[3/4] overflow-hidden relative">
                    <img src="<?= get_image_url($doctor['image'], 'doctor') ?>" 
                         alt="<?= $doctor['name'] ?>" 
                         data-category="doctor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-900 mb-1"><?= $doctor['name'] ?></h3>
                    <p class="text-primary-600 font-medium mb-4"><?= $doctor['specialty'] ?></p>
                    <a href="<?= base_url('doctors/' . $doctor['slug']) ?>" class="block w-full py-3 bg-gray-50 text-gray-900 font-bold rounded-xl hover:bg-primary-600 hover:text-white transition-colors">
                        Lihat Profil
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
