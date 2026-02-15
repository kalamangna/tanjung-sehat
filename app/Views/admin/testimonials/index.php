<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-8">
    <h3 class="text-2xl font-bold text-gray-900">Testimoni</h3>
    <a href="<?= base_url('admin/testimonials/new') ?>" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
        <i class="fas fa-plus mr-2"></i> Tambah Testimoni
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
            <tr>
                <th class="px-6 py-4">Pasien</th>
                <th class="px-6 py-4">Pesan</th>
                <th class="px-6 py-4 text-center">Rating</th>
                <th class="px-6 py-4 text-center">Status</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach ($testimonials as $testi): ?>
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <div class="font-bold text-gray-900"><?= $testi['name'] ?></div>
                </td>
                <td class="px-6 py-4 text-gray-600 text-sm italic">
                    "<?= substr($testi['content'], 0, 100) ?><?= strlen($testi['content']) > 100 ? '...' : '' ?>"
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="text-yellow-400 text-xs">
                        <?php for($i=0; $i<$testi['rating']; $i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                    </div>
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="<?= base_url('admin/testimonials/toggle/' . $testi['id']) ?>">
                        <?php if ($testi['is_active']): ?>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Aktif</span>
                        <?php else: ?>
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">Nonaktif</span>
                        <?php endif; ?>
                    </a>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="<?= base_url('admin/testimonials/edit/' . $testi['id']) ?>" class="text-blue-600 hover:text-blue-800" title="Edit"><i class="fas fa-edit"></i></a>
                    <a href="<?= base_url('admin/testimonials/delete/' . $testi['id']) ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Hapus testimoni ini?')" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (empty($testimonials)): ?>
    <div class="text-center py-20 bg-white rounded-2xl mt-4 border border-dashed border-gray-200">
        <i class="fas fa-comments text-6xl text-gray-100 mb-4"></i>
        <p class="text-gray-400">Belum ada testimoni pasien.</p>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
