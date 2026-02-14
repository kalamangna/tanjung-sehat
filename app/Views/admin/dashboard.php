<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center">
        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mr-6">
            <i class="fas fa-hand-holding-medical text-2xl"></i>
        </div>
        <div>
            <div class="text-gray-500 text-sm font-medium">Total Layanan</div>
            <div class="text-3xl font-bold text-gray-900"><?= $stats['services'] ?></div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center">
        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mr-6">
            <i class="fas fa-user-md text-2xl"></i>
        </div>
        <div>
            <div class="text-gray-500 text-sm font-medium">Total Dokter</div>
            <div class="text-3xl font-bold text-gray-900"><?= $stats['doctors'] ?></div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center">
        <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mr-6">
            <i class="fas fa-newspaper text-2xl"></i>
        </div>
        <div>
            <div class="text-gray-500 text-sm font-medium">Artikel Blog</div>
            <div class="text-3xl font-bold text-gray-900"><?= $stats['blogs'] ?></div>
        </div>
    </div>
</div>

<div class="mt-12 bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
    <h3 class="text-xl font-bold mb-4">Selamat Datang di Panel Admin Tanjung Sehat</h3>
    <p class="text-gray-600">Gunakan menu di samping untuk mengelola konten website Anda.</p>
</div>

<?= $this->endSection() ?>