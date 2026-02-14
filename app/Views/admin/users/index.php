<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-8">
    <h3 class="text-2xl font-bold text-gray-900">Pengguna Sistem</h3>
    <a href="<?= base_url('admin/users/new') ?>" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
        <i class="fas fa-user-plus mr-2"></i> Tambah Pengguna
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
            <tr>
                <th class="px-6 py-4">Nama</th>
                <th class="px-6 py-4">Username</th>
                <th class="px-6 py-4">Role</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach ($users as $user): ?>
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 font-semibold text-gray-900"><?= $user['name'] ?></td>
                <td class="px-6 py-4 text-gray-600"><?= $user['username'] ?></td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 bg-primary-50 text-primary-700 rounded-full text-xs font-bold"><?= $user['role_name'] ?></span>
                </td>
                <td class="px-6 py-4 text-gray-500 text-sm"><?= $user['email'] ?></td>
                <td class="px-6 py-4 text-right">
                    <a href="<?= base_url('admin/users/delete/' . $user['id']) ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
