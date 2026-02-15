<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="<?= base_url() ?>" class="flex items-center space-x-2">
            <span class="text-xl md:text-2xl font-bold text-primary-600">
                Klinik & Apotek <span class="text-secondary-500">Tanjung Sehat</span>
            </span>
        </a>
        
        <nav class="hidden lg:flex space-x-6 font-medium">
            <a href="<?= base_url() ?>" class="hover:text-primary-600 transition-colors">Beranda</a>
            <a href="<?= base_url('about') ?>" class="hover:text-primary-600 transition-colors">Tentang</a>
            <a href="<?= base_url('services') ?>" class="hover:text-primary-600 transition-colors">Layanan</a>
            <a href="<?= base_url('pharmacy') ?>" class="hover:text-primary-600 transition-colors">Apotek</a>
            <a href="<?= base_url('doctors') ?>" class="hover:text-primary-600 transition-colors">Dokter</a>
            <a href="<?= base_url('blog') ?>" class="hover:text-primary-600 transition-colors">Blog</a>
            <a href="<?= base_url('gallery') ?>" class="hover:text-primary-600 transition-colors">Galeri</a>
            <a href="<?= base_url('contact') ?>" class="hover:text-primary-600 transition-colors">Kontak</a>
        </nav>
        
        <div class="lg:hidden">
            <button id="menu-btn" class="text-gray-600 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
                        <?php $wa_link = (isset($settings['whatsapp_number']) && strpos($settings['whatsapp_number'], '0') === 0) ? '62' . substr($settings['whatsapp_number'], 1) : ($settings['whatsapp_number'] ?? ''); ?>
        
                        <a href="https://wa.me/<?= $wa_link ?>" class="hidden xl:block bg-primary-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-primary-700 transition-colors">
        
                            Hubungi WhatsApp
        
                        </a>
        
                    </div>
        
                    
        
                    <!-- Mobile Menu -->
        
                    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 px-4 py-4 space-y-4 shadow-xl">
        
                        <a href="<?= base_url() ?>" class="block font-medium hover:text-primary-600">Beranda</a>
        
                        <a href="<?= base_url('about') ?>" class="block font-medium hover:text-primary-600">Tentang</a>
        
                        <a href="<?= base_url('services') ?>" class="block font-medium hover:text-primary-600">Layanan</a>
        
                        <a href="<?= base_url('pharmacy') ?>" class="block font-medium hover:text-primary-600">Apotek</a>
        
                        <a href="<?= base_url('doctors') ?>" class="block font-medium hover:text-primary-600">Dokter</a>
        
                        <a href="<?= base_url('blog') ?>" class="block font-medium hover:text-primary-600">Blog</a>
        
                        <a href="<?= base_url('gallery') ?>" class="block font-medium hover:text-primary-600">Galeri</a>
        
                        <a href="<?= base_url('contact') ?>" class="block font-medium hover:text-primary-600">Kontak</a>
        
                        <a href="https://wa.me/<?= $wa_link ?>" class="block w-full text-center bg-primary-600 text-white py-3 rounded-xl font-bold">Hubungi WhatsApp</a>
        
                    </div>
        
                </header>
        
                
        
        