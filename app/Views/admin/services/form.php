<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="<?= isset($service) ? base_url('admin/services/update/' . $service['id']) : base_url('admin/services/create') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Nama Layanan</label>
                <input type="text" name="title" value="<?= old('title', $service['title'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required>
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Icon (Nama FontAwesome)</label>
                <input type="text" name="icon" value="<?= old('icon', $service['icon'] ?? 'stethoscope') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" placeholder="e.g. stethoscope">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Ringkasan Singkat</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required><?= old('description', $service['description'] ?? '') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Konten Detail</label>
            <textarea name="content" rows="10" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required><?= old('content', $service['content'] ?? '') ?></textarea>
        </div>

        <div class="mb-8">
            <label class="flex items-center space-x-3 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" <?= old('is_active', $service['is_active'] ?? 1) ? 'checked' : '' ?> class="w-5 h-5 text-primary-600 rounded">
                <span class="text-gray-700 font-bold">Tampilkan di Website</span>
            </label>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="<?= base_url('admin/services') ?>" class="px-6 py-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-bold">
                <?= isset($service) ? 'Perbarui Layanan' : 'Simpan Layanan' ?>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>