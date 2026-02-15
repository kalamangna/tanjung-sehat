<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Punya pertanyaan atau ingin buat janji? Tim kami siap membantu Anda.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-16">
            <div class="lg:w-1/3 space-y-8">
                <div class="bg-primary-50 p-8 rounded-3xl border border-primary-100">
                    <h3 class="text-xl font-bold text-primary-900 mb-6">Info Kontak</h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-white text-primary-600 rounded-full flex items-center justify-center shrink-0 shadow-sm">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">Alamat</div>
                                <p class="text-gray-600"><?= $settings['contact_address'] ?? 'Makassar, Indonesia' ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-white text-primary-600 rounded-full flex items-center justify-center shrink-0 shadow-sm">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">WhatsApp</div>
                                <p class="text-gray-600"><?= $settings['whatsapp_number'] ?? '' ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-white text-primary-600 rounded-full flex items-center justify-center shrink-0 shadow-sm">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">Email</div>
                                <p class="text-gray-600"><?= $settings['contact_email'] ?? '' ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary-50 p-8 rounded-3xl border border-secondary-100">
                    <h3 class="text-xl font-bold text-secondary-900 mb-4">Jam Buka</h3>
                    <ul class="space-y-3 text-secondary-800">
                        <li class="flex justify-between border-b border-secondary-200 pb-2"><span>Senin - Jumat</span> <span>08:00 - 21:00</span></li>
                        <li class="flex justify-between border-b border-secondary-200 pb-2"><span>Sabtu</span> <span>08:00 - 18:00</span></li>
                        <li class="flex justify-between font-bold text-red-600"><span>Minggu</span> <span>Tutup</span></li>
                    </ul>
                </div>
            </div>

            <div class="lg:w-2/3 bg-white p-8 md:p-12 rounded-3xl border border-gray-100 shadow-xl">
                <h3 class="text-2xl font-bold mb-8">Kirim Pesan</h3>
                <form action="<?= base_url('contact/send') ?>" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?= csrf_field() ?>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" placeholder="Contoh: Andi Wijaya" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Kontak (HP/Email)</label>
                        <input type="text" name="contact" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" placeholder="Contoh: 08123456789" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Perihal</label>
                        <select name="subject" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500">
                            <option>Tanya Umum</option>
                            <option>Jadwal Dokter</option>
                            <option>Info Obat</option>
                            <option>Kritik & Saran</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Pesan</label>
                        <textarea name="message" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="w-full bg-primary-600 text-white font-bold py-4 rounded-xl hover:bg-primary-700 transition-colors shadow-lg shadow-primary-100">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps Embed -->
<section class="h-[500px] w-full bg-gray-200 grayscale hover:grayscale-0 transition-all duration-700">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.462998222913!2d119.3847239793457!3d-5.1896622000000034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d0d932cb2a5%3A0x298145d049ef0e85!2sKlinik%20%26%20Apotik%20Tanjung%20Sehat!5e0!3m2!1sen!2sid!4v1771158093622!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?= $this->endSection() ?>