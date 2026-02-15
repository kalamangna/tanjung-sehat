<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="<?= isset($doctor) ? base_url('admin/doctors/update/' . $doctor['id']) : base_url('admin/doctors/create') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Nama Dokter</label>
                <input type="text" name="name" value="<?= old('name', $doctor['name'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required>
            </div>
            <div class="col-span-1">
                <label class="block text-gray-700 font-bold mb-2">Spesialisasi</label>
                <input type="text" name="specialty" value="<?= old('specialty', $doctor['specialty'] ?? '') ?>" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary-500" required placeholder="misal: Dokter Umum">
            </div>
        </div>

        <div class="mb-8">
            <label class="block text-gray-700 font-bold mb-4 text-lg border-b pb-2">Jadwal Pelayanan (WITA)</label>
            <div class="space-y-4">
                <?php 
                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                $schedule = [];
                if (isset($doctor['service_days']) && !empty($doctor['service_days'])) {
                    $schedule = json_decode($doctor['service_days'], true) ?: [];
                }
                foreach ($days as $day): 
                    $isActive = isset($schedule[$day]);
                    $start = $schedule[$day]['start'] ?? '08:00';
                    $end = $schedule[$day]['end'] ?? '14:00';
                ?>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100 transition-colors hover:bg-white schedule-row">
                    <label class="flex items-center space-x-3 cursor-pointer min-w-[120px]">
                        <input type="checkbox" name="schedule[<?= $day ?>][active]" value="1" <?= $isActive ? 'checked' : '' ?> 
                               class="day-checkbox w-5 h-5 text-primary-600 rounded">
                        <span class="font-bold text-gray-700"><?= $day ?></span>
                    </label>
                    <div class="flex items-center space-x-3 flex-grow">
                        <div class="flex-1">
                            <input type="time" name="schedule[<?= $day ?>][start]" value="<?= $start ?>" 
                                   class="time-input w-full px-3 py-1.5 rounded-lg border border-gray-200 outline-none focus:border-primary-500 disabled:opacity-50 disabled:bg-gray-200">
                        </div>
                        <span class="text-gray-400 font-bold">sampai</span>
                        <div class="flex-1">
                            <input type="time" name="schedule[<?= $day ?>][end]" value="<?= $end ?>" 
                                   class="time-input w-full px-3 py-1.5 rounded-lg border border-gray-200 outline-none focus:border-primary-500 disabled:opacity-50 disabled:bg-gray-200">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <p class="text-xs text-gray-500 mt-4 italic">* Centang hari untuk mengaktifkan jam pelayanan pada hari tersebut.</p>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const rows = document.querySelectorAll('.schedule-row');
                rows.forEach(row => {
                    const checkbox = row.querySelector('.day-checkbox');
                    const timeInputs = row.querySelectorAll('.time-input');
                    
                    const updateState = () => {
                        timeInputs.forEach(input => {
                            input.disabled = !checkbox.checked;
                        });
                    };
                    
                    checkbox.addEventListener('change', updateState);
                    updateState(); // Initialize state
                });
            });
        </script>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Foto Dokter</label>
            <?php if (isset($doctor) && $doctor['image']): ?>
                <div class="mb-4">
                    <img src="<?= base_url('uploads/doctors/' . $doctor['image']) ?>" class="w-32 h-40 object-cover rounded-xl shadow-md">
                </div>
            <?php endif; ?>
            <input type="file" name="image" class="w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
            <p class="text-xs text-gray-400 mt-2">Maks 2MB. Format: JPG, PNG, WEBP</p>
        </div>

        <div class="mb-8">
            <label class="flex items-center space-x-3 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" <?= old('is_active', $doctor['is_active'] ?? 1) ? 'checked' : '' ?> class="w-5 h-5 text-primary-600 rounded">
                <span class="text-gray-700 font-bold">Tampilkan di Website</span>
            </label>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="<?= base_url('admin/doctors') ?>" class="px-6 py-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-bold">
                <?= isset($doctor) ? 'Perbarui Dokter' : 'Simpan Dokter' ?>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
