<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="flex flex-col md:flex-row gap-12 items-center">
            <div class="md:w-2/5">
                <div class="rounded-3xl overflow-hidden shadow-2xl aspect-[3/4]">
                    <img src="<?= get_image_url($doctor['image'], 'doctor') ?>" alt="<?= $doctor['name'] ?>" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="md:w-3/5">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2"><?= $doctor['name'] ?></h1>
                    <span class="inline-block px-4 py-1 bg-secondary-100 text-secondary-700 rounded-full font-bold text-sm uppercase tracking-wider">
                        <?= $doctor['specialty'] ?>
                    </span>
                </div>

                <div class="p-8 bg-primary-50 rounded-3xl border border-primary-100">
                    <h4 class="font-bold text-primary-900 mb-6 flex items-center text-lg">
                        <i class="fas fa-calendar-alt mr-3"></i> Jadwal Praktik
                    </h4>
                    <div class="space-y-3">
                        <?php
                        $schedule = [];
                        if (isset($doctor['service_days']) && !empty($doctor['service_days'])) {
                            $schedule = json_decode($doctor['service_days'], true) ?: [];
                        }

                        if (!empty($schedule)):
                            foreach ($schedule as $day => $times):
                        ?>
                                <div class="flex justify-between items-center pb-2 border-b border-primary-100 last:border-0 last:pb-0">
                                    <span class="font-bold text-primary-900"><?= $day ?></span>
                                    <span class="text-primary-700 font-medium">
                                        <?= str_replace(':', '.', substr($times['start'], 0, 5)) ?> – <?= str_replace(':', '.', substr($times['end'], 0, 5)) ?> WITA
                                    </span>
                                </div>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <p class="text-primary-800 italic">Hubungi kami untuk jadwal lengkap.</p>
                        <?php endif; ?>
                    </div>

                    <div class="mt-8 pt-8 border-t border-primary-100 flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div class="text-primary-800 text-sm italic">Silakan datang sesuai jadwal atau hubungi kami via WhatsApp.</div>
                        <?php $wa_link = (isset($settings['whatsapp_number']) && strpos($settings['whatsapp_number'], '0') === 0) ? '62' . substr($settings['whatsapp_number'], 1) : ($settings['whatsapp_number'] ?? ''); ?>
                        <a href="https://wa.me/<?= $wa_link ?>?text=Halo%20Admin,%20saya%20ingin%20tanya%20jadwal%20dokter%20<?= urlencode($doctor['name']) ?>" class="bg-primary-600 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-primary-700 transition-all flex items-center whitespace-nowrap">
                            <i class="fab fa-whatsapp mr-2 text-xl"></i> Chat WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>