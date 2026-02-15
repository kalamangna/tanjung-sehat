<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="<?= isset($testimonial) ? base_url('admin/testimonials/update/' . $testimonial['id']) : base_url('admin/testimonials/create') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Nama Pasien</label>
            <input type="text" name="name" value="<?= old('name', $testimonial['name'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Rating</label>
            <select name="rating" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500 bg-white" required>
                <?php for($i=5; $i>=1; $i--): ?>
                    <option value="<?= $i ?>" <?= old('rating', $testimonial['rating'] ?? 5) == $i ? 'selected' : '' ?>><?= $i ?> Bintang</option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Isi Testimoni</label>
            <textarea name="content" rows="5" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required><?= old('content', $testimonial['content'] ?? '') ?></textarea>
        </div>

        <div class="mb-8">
            <label class="flex items-center space-x-3 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" <?= old('is_active', $testimonial['is_active'] ?? 1) ? 'checked' : '' ?> class="w-5 h-5 text-primary-600 rounded">
                <span class="text-gray-700 font-bold">Tampilkan di Website</span>
            </label>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="<?= base_url('admin/testimonials') ?>" class="px-6 py-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-bold">
                <?= isset($testimonial) ? 'Perbarui Testimoni' : 'Simpan Testimoni' ?>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
