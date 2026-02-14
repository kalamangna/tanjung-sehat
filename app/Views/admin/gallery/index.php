<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-8">
    <h3 class="text-2xl font-bold text-gray-900">Manajemen Galeri</h3>
    <button onclick="document.getElementById('upload-modal').classList.remove('hidden')" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
        <i class="fas fa-plus mr-2"></i> Unggah Foto
    </button>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php foreach ($items as $item): ?>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group">
        <div class="aspect-square overflow-hidden relative">
            <?php 
                $image_src = $item['image'];
                if ($image_src && !filter_var($image_src, FILTER_VALIDATE_URL)) {
                    $image_src = base_url('uploads/gallery/' . $image_src);
                }
            ?>
            <img src="<?= $image_src ?>" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                <a href="<?= base_url('admin/gallery/delete/' . $item['id']) ?>" class="text-white hover:text-red-400 p-2" onclick="return confirm('Hapus foto ini?')">
                    <i class="fas fa-trash text-xl"></i>
                </a>
            </div>
        </div>
        <div class="p-4">
            <div class="font-bold text-gray-900 line-clamp-1"><?= $item['title'] ?></div>
            <div class="text-xs text-primary-600 font-medium uppercase mt-1"><?= $item['category'] ?></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Upload Modal -->
<div id="upload-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-3xl p-8 max-w-md w-full mx-4 shadow-2xl">
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-xl font-bold text-gray-900">Unggah Foto Baru</h4>
            <button onclick="document.getElementById('upload-modal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times text-xl"></i></button>
        </div>
        <form action="<?= base_url('admin/gallery/create') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Foto</label>
                <input type="text" name="title" class="w-full px-4 py-2 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                <input type="text" name="category" class="w-full px-4 py-2 rounded-xl border border-gray-200 outline-none focus:border-primary-500" placeholder="Contoh: Fasilitas, Kegiatan" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Pilih File</label>
                <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100" required>
            </div>
            <button type="submit" class="w-full bg-primary-600 text-white font-bold py-3 rounded-xl hover:bg-primary-700 shadow-lg shadow-primary-100 transition-all">
                Mulai Unggah
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
