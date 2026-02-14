<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-8">
    <h3 class="text-2xl font-bold text-gray-900">Blog Posts</h3>
    <a href="<?= base_url('admin/blog/new') ?>" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
        <i class="fas fa-plus mr-2"></i> New Post
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
            <tr>
                <th class="px-6 py-4">Title</th>
                <th class="px-6 py-4">Category</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach ($blogs as $blog): ?>
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 font-semibold text-gray-900"><?= $blog['title'] ?></td>
                <td class="px-6 py-4 text-gray-600"><?= $blog['category_name'] ?></td>
                <td class="px-6 py-4">
                    <?php if ($blog['status'] == 'published'): ?>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Published</span>
                    <?php else: ?>
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">Draft</span>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="<?= base_url('admin/blog/edit/' . $blog['id']) ?>" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                    <a href="<?= base_url('admin/blog/delete/' . $blog['id']) ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
