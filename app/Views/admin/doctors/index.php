<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-8">
    <h3 class="text-2xl font-bold text-gray-900">Doctors</h3>
    <a href="<?= base_url('admin/doctors/new') ?>" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
        <i class="fas fa-plus mr-2"></i> Add Doctor
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
            <tr>
                <th class="px-6 py-4">Image</th>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Specialty</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach ($doctors as $doctor): ?>
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <img src="<?= $doctor['image'] ? base_url('uploads/doctors/' . $doctor['image']) : 'https://ui-avatars.com/api/?name=' . urlencode($doctor['name']) ?>" class="w-10 h-10 rounded-full object-cover">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900"><?= $doctor['name'] ?></td>
                <td class="px-6 py-4 text-gray-600"><?= $doctor['specialty'] ?></td>
                <td class="px-6 py-4">
                    <?php if ($doctor['is_active']): ?>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Active</span>
                    <?php else: ?>
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">Inactive</span>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="<?= base_url('admin/doctors/edit/' . $doctor['id']) ?>" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                    <a href="<?= base_url('admin/doctors/delete/' . $doctor['id']) ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
