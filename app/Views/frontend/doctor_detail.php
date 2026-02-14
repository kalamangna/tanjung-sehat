<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="flex flex-col md:flex-row gap-12 items-start">
            <div class="md:w-1/3 sticky top-24">
                <div class="rounded-3xl overflow-hidden shadow-2xl">
                    <?php 
                        $image_src = $doctor['image'];
                        if ($image_src && strpos($image_src, 'http') !== 0) {
                            $image_src = base_url('uploads/doctors/' . $image_src);
                        }
                    ?>
                    <?php if ($image_src): ?>
                        <img src="<?= $image_src ?>" alt="<?= $doctor['name'] ?>" class="w-full">
                    <?php else: ?>
                        <div class="w-full aspect-[3/4] bg-gray-100 flex items-center justify-center text-gray-400">
                            <i class="fas fa-user-md text-8xl"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mt-8 p-6 bg-primary-50 rounded-2xl border border-primary-100">
                    <h4 class="font-bold text-primary-900 mb-4 flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i> Jadwal Praktik
                    </h4>
                    <p class="text-primary-800 whitespace-pre-line"><?= $doctor['schedule'] ?? 'Hubungi kami untuk info jadwal.' ?></p>
                </div>
            </div>
            
            <div class="md:w-2/3">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2"><?= $doctor['name'] ?></h1>
                    <span class="inline-block px-4 py-1 bg-secondary-100 text-secondary-700 rounded-full font-bold text-sm uppercase tracking-wider">
                        <?= $doctor['specialty'] ?>
                    </span>
                </div>
                
                <div class="prose prose-lg max-w-none text-gray-700 mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Biografi</h3>
                    <?= $doctor['biography'] ?>
                </div>

                <div class="border-t pt-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8">Buat Janji Temu</h3>
                    <form action="<?= base_url('contact/booking') ?>" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?= csrf_field() ?>
                        <input type="hidden" name="doctor_id" value="<?= $doctor['id'] ?>">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Nomor WhatsApp</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
                        </div>
                        <div class="md:col-span-2 text-right">
                            <button type="submit" class="bg-primary-600 text-white px-10 py-4 rounded-full font-bold shadow-lg hover:bg-primary-700 transition-all">
                                Kirim Permintaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>