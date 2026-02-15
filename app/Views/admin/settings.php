<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="<?= base_url('admin/settings/update') ?>" method="POST">
        <?= csrf_field() ?>

        <h4 class="text-lg font-bold mb-6 text-primary-600 border-b pb-2">Informasi Umum</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Nama Website</label>
                <input type="text" name="settings[site_name]" value="<?= $settings['site_name'] ?? '' ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500">
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Tagline</label>
                <input type="text" name="settings[site_tagline]" value="<?= $settings['site_tagline'] ?? '' ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500">
            </div>
        </div>

        <h4 class="text-lg font-bold mb-6 text-primary-600 border-b pb-2">Info Kontak</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Alamat Email</label>
                <input type="email" name="settings[contact_email]" value="<?= $settings['contact_email'] ?? '' ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500">
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Nomor WhatsApp</label>
                <input type="text" name="settings[whatsapp_number]" value="<?= $settings['whatsapp_number'] ?? '' ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500">
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Alamat Lengkap</label>
                <textarea name="settings[contact_address]" rows="2" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500"><?= $settings['contact_address'] ?? '' ?></textarea>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-10 py-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 font-bold shadow-lg shadow-primary-100 transition-all">
                Simpan Semua Pengaturan
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>