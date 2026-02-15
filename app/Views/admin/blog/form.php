<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<form action="<?= isset($blog) ? base_url('admin/blog/update/' . $blog['id']) : base_url('admin/blog/create') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content (Left) -->
        <div class="lg:w-2/3 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <div class="mb-8">
                    <label class="block text-gray-400 font-bold text-xs uppercase tracking-widest mb-2">Judul Artikel</label>
                    <input type="text" name="title" value="<?= old('title', $blog['title'] ?? '') ?>" 
                           placeholder="Masukkan judul artikel yang menarik..."
                           class="w-full text-3xl font-bold border-none outline-none focus:ring-0 p-0 placeholder-gray-200" required>
                </div>

                <div>
                    <label class="block text-gray-400 font-bold text-xs uppercase tracking-widest mb-2">Konten Lengkap</label>
                    <textarea name="content" rows="20" 
                              placeholder="Mulai menulis cerita Anda di sini..."
                              class="w-full border-none outline-none focus:ring-0 p-0 text-gray-700 leading-relaxed placeholder-gray-200 resize-none min-h-[500px]" required><?= old('content', $blog['content'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Sidebar (Right) -->
        <div class="lg:w-1/3 space-y-6">
            <!-- Publish Box -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h4 class="font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-paper-plane mr-2 text-primary-600"></i> Publikasi
                </h4>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Status</label>
                        <select name="status" class="w-full px-4 py-2 rounded-xl border border-gray-200 outline-none focus:border-primary-500 bg-white font-medium text-gray-700">
                            <option value="published" <?= (old('status', $blog['status'] ?? '') == 'published') ? 'selected' : '' ?>>Terbit</option>
                            <option value="draft" <?= (old('status', $blog['status'] ?? '') == 'draft') ? 'selected' : '' ?>>Draf</option>
                        </select>
                    </div>
                    <div class="pt-4 border-t border-gray-50 flex items-center justify-between">
                        <a href="<?= base_url('admin/blog') ?>" class="text-sm text-gray-500 hover:text-gray-700 underline">Batal</a>
                        <button type="submit" class="bg-primary-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-primary-700 shadow-lg shadow-primary-100 transition-all">
                            Simpan Artikel
                        </button>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h4 class="font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-image mr-2 text-primary-600"></i> Gambar Utama
                </h4>
                <?php if (isset($blog) && $blog['image']): ?>
                    <div class="mb-4 rounded-xl overflow-hidden aspect-video bg-gray-100">
                        <img src="<?= base_url('uploads/blog/' . $blog['image']) ?>" class="w-full h-full object-cover">
                    </div>
                <?php endif; ?>
                <input type="file" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                <p class="text-[10px] text-gray-400 mt-2">Format: JPG, PNG, WEBP. Maks: 3MB.</p>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>