<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
    <form action="<?= base_url('admin/users/create') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="name" value="<?= old('name') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" value="<?= old('email') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Username</label>
                <input type="text" name="username" value="<?= old('username') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Role / Hak Akses</label>
                <select name="role_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary-500" required>
                    <option value="">Pilih Role</option>
                    <?php foreach ($roles as $role): ?>
                        <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="<?= base_url('admin/users') ?>" class="px-6 py-3 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-10 py-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 font-bold shadow-lg shadow-primary-100 transition-all">
                Simpan Pengguna
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
