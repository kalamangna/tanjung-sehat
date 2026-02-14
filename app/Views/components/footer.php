<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-12">
        <div class="col-span-1 md:col-span-1">
            <h3 class="text-2xl font-bold mb-6 text-primary-400">TanjungSehat</h3>
            <p class="text-gray-400 mb-6 italic">
                <?= $settings['site_tagline'] ?? 'Sehat Lebih Dekat, Lebih Cepat.' ?>
            </p>
            <div class="flex space-x-4">
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        
        <div>
            <h4 class="text-lg font-semibold mb-6 border-b border-gray-800 pb-2">Menu Utama</h4>
            <ul class="space-y-4 text-gray-400">
                <li><a href="<?= base_url('about') ?>" class="hover:text-primary-400 transition-colors">Tentang Kami</a></li>
                <li><a href="<?= base_url('services') ?>" class="hover:text-primary-400 transition-colors">Layanan</a></li>
                <li><a href="<?= base_url('doctors') ?>" class="hover:text-primary-400 transition-colors">Dokter</a></li>
                <li><a href="<?= base_url('pharmacy') ?>" class="hover:text-primary-400 transition-colors">Apotik</a></li>
            </ul>
        </div>
        
        <div>
            <h4 class="text-lg font-semibold mb-6 border-b border-gray-800 pb-2">Lainnya</h4>
            <ul class="space-y-4 text-gray-400">
                <li><a href="<?= base_url('blog') ?>" class="hover:text-primary-400 transition-colors">Blog</a></li>
                <li><a href="<?= base_url('gallery') ?>" class="hover:text-primary-400 transition-colors">Galeri</a></li>
                <li><a href="<?= base_url('privacy-policy') ?>" class="hover:text-primary-400 transition-colors">Privasi</a></li>
                <li><a href="<?= base_url('disclaimer') ?>" class="hover:text-primary-400 transition-colors">Disclaimer</a></li>
            </ul>
        </div>
        
        <div>
            <h4 class="text-lg font-semibold mb-6 border-b border-gray-800 pb-2">Kontak</h4>
            <ul class="space-y-4 text-gray-400 text-sm">
                <li class="flex items-start space-x-3">
                    <i class="fas fa-map-marker-alt mt-1 text-primary-400"></i>
                    <span><?= $settings['contact_address'] ?? 'Makassar, Indonesia' ?></span>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fas fa-phone text-primary-400"></i>
                    <span><?= $settings['contact_phone'] ?? '' ?></span>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fas fa-envelope text-primary-400"></i>
                    <span><?= $settings['contact_email'] ?? '' ?></span>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="container mx-auto px-4 mt-16 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
        <p>&copy; <?= date('Y') ?> <?= $settings['site_name'] ?? 'Klinik Tanjung Sehat' ?>.</p>
    </div>
</footer>
