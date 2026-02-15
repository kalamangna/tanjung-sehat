<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> | Admin Tanjung Sehat</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-900 text-white flex-shrink-0 hidden md:flex flex-col fixed inset-y-0 left-0 z-50 md:relative transition-all duration-300">
        <div class="p-6 border-b border-gray-800 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold text-primary-400">Tanjung Sehat</h1>
                <p class="text-xs text-gray-500 uppercase mt-1 font-bold tracking-widest"><?= session()->get('role') ?></p>
            </div>
            <button id="close-sidebar" class="md:hidden text-gray-500 hover:text-white">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <a href="<?= base_url('admin') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (uri_string() == 'admin') ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-home mr-3 w-5"></i> Dasbor
            </a>
            
            <?php if (has_permission('manage_services')): ?>
            <a href="<?= base_url('admin/services') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (strpos(uri_string(), 'admin/services') !== false) ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-hand-holding-medical mr-3 w-5"></i> Layanan
            </a>
            <?php endif; ?>

            <?php if (has_permission('manage_doctors')): ?>
            <a href="<?= base_url('admin/doctors') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (strpos(uri_string(), 'admin/doctors') !== false) ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-user-md mr-3 w-5"></i> Dokter
            </a>
            <?php endif; ?>

            <?php if (has_permission('manage_gallery')): ?>
            <a href="<?= base_url('admin/gallery') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (strpos(uri_string(), 'admin/gallery') !== false) ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-images mr-3 w-5"></i> Galeri
            </a>
            <?php endif; ?>

            <?php if (has_permission('manage_testimonials')): ?>
            <a href="<?= base_url('admin/testimonials') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (strpos(uri_string(), 'admin/testimonials') !== false) ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-comments mr-3 w-5"></i> Testimoni
            </a>
            <?php endif; ?>

            <?php if (has_permission('manage_blog')): ?>
            <a href="<?= base_url('admin/blog') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (strpos(uri_string(), 'admin/blog') !== false) ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-newspaper mr-3 w-5"></i> Blog
            </a>
            <?php endif; ?>

            <?php if (has_permission('manage_users')): ?>
            <a href="<?= base_url('admin/users') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (strpos(uri_string(), 'admin/users') !== false) ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-users-cog mr-3 w-5"></i> Pengguna
            </a>
            <?php endif; ?>

            <?php if (has_permission('manage_settings')): ?>
            <a href="<?= base_url('admin/settings') ?>" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors <?= (uri_string() == 'admin/settings') ? 'bg-primary-600 text-white' : '' ?>">
                <i class="fas fa-cog mr-3 w-5"></i> Pengaturan
            </a>
            <?php endif; ?>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <a href="<?= base_url('admin/logout') ?>" class="block px-4 py-2 text-red-400 hover:bg-gray-800 rounded-lg transition-colors">
                <i class="fas fa-sign-out-alt mr-3 w-5"></i> Keluar
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <button id="open-sidebar" class="md:hidden mr-4 text-gray-600"><i class="fas fa-bars text-xl"></i></button>
                <h2 class="text-xl font-semibold text-gray-800"><?= $title ?? 'Dasbor' ?></h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right hidden sm:block">
                    <div class="text-sm font-bold text-gray-900"><?= session()->get('name') ?></div>
                    <div class="text-xs text-gray-500"><?= session()->get('role') ?></div>
                </div>
                <div class="w-10 h-10 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center font-bold border-2 border-primary-200">
                    <?= substr(session()->get('name'), 0, 1) ?>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="p-8">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center">
                    <i class="fas fa-check-circle mr-3"></i> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center">
                    <i class="fas fa-exclamation-triangle mr-3"></i> <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Mobile Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('flex');
            overlay.classList.toggle('hidden');
        }

        openSidebar?.addEventListener('click', toggleSidebar);
        closeSidebar?.addEventListener('click', toggleSidebar);
        overlay?.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>