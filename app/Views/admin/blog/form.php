<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="<?= isset($blog) ? base_url('admin/blog/update/' . $blog['id']) : base_url('admin/blog/create') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Post Title</label>
            <input type="text" name="title" value="<?= old('title', $blog['title'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Category</label>
                <select name="category_id" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (old('category_id', $blog['category_id'] ?? '') == $cat['id']) ? 'selected' : '' ?>><?= $cat['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500">
                    <option value="published" <?= (old('status', $blog['status'] ?? '') == 'published') ? 'selected' : '' ?>>Published</option>
                    <option value="draft" <?= (old('status', $blog['status'] ?? '') == 'draft') ? 'selected' : '' ?>>Draft</option>
                </select>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Summary / Short Description</label>
            <textarea name="summary" rows="3" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required><?= old('summary', $blog['summary'] ?? '') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Full Content</label>
            <textarea name="content" rows="15" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required><?= old('content', $blog['content'] ?? '') ?></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Feature Image</label>
                <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700">
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Meta Title (SEO)</label>
                <input type="text" name="meta_title" value="<?= old('meta_title', $blog['meta_title'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500">
            </div>
        </div>

        <div class="mb-8">
            <label class="block text-gray-700 font-bold mb-2">Meta Description (SEO)</label>
            <textarea name="meta_desc" rows="2" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500"><?= old('meta_desc', $blog['meta_desc'] ?? '') ?></textarea>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="<?= base_url('admin/blog') ?>" class="px-6 py-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-10 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-bold">
                Save Post
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
