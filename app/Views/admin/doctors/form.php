<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="<?= isset($doctor) ? base_url('admin/doctors/update/' . $doctor['id']) : base_url('admin/doctors/create') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Doctor Name</label>
                <input type="text" name="name" value="<?= old('name', $doctor['name'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required>
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Specialty</label>
                <input type="text" name="specialty" value="<?= old('specialty', $doctor['specialty'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required placeholder="e.g. Dokter Umum">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Biography</label>
            <textarea name="biography" rows="5" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500"><?= old('biography', $doctor['biography'] ?? '') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Schedule</label>
            <textarea name="schedule" rows="3" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" placeholder="Senin - Jumat: 08:00 - 16:00"><?= old('schedule', $doctor['schedule'] ?? '') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Doctor Photo</label>
            <?php if (isset($doctor) && $doctor['image']): ?>
                <div class="mb-4">
                    <img src="<?= base_url('uploads/doctors/' . $doctor['image']) ?>" class="w-32 h-40 object-cover rounded-xl shadow-md">
                </div>
            <?php endif; ?>
            <input type="file" name="image" class="w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
            <p class="text-xs text-gray-400 mt-2">Max 2MB. Format: JPG, PNG, WEBP</p>
        </div>

        <div class="mb-8">
            <label class="flex items-center space-x-3 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" <?= old('is_active', $doctor['is_active'] ?? 1) ? 'checked' : '' ?> class="w-5 h-5 text-primary-600 rounded">
                <span class="text-gray-700 font-bold">Show on Website</span>
            </label>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="<?= base_url('admin/doctors') ?>" class="px-6 py-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-bold">
                <?= isset($doctor) ? 'Update Doctor' : 'Save Doctor' ?>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
