<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Blog & Artikel</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Tips kesehatan dan berita terbaru dari Klinik & Apotik Tanjung Sehat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php foreach ($blogs as $blog): ?>
            <article class="group">
                <div class="relative overflow-hidden rounded-3xl aspect-[16/10] mb-6 bg-gray-100 shadow-md">
                    <img src="<?= get_image_url($blog['image'], 'blog') ?>" 
                         alt="<?= $blog['title'] ?>" 
                         data-category="blog"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                            <?= $blog['category_name'] ?>
                        </span>
                    </div>
                </div>
                <div class="flex items-center text-sm text-gray-500 mb-4 gap-4">
                    <span class="flex items-center gap-1"><i class="far fa-calendar"></i> <?= date('d M Y', strtotime($blog['created_at'])) ?></span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-600 transition-colors line-clamp-2">
                    <a href="<?= base_url('blog/' . $blog['slug']) ?>"><?= $blog['title'] ?></a>
                </h3>
                <p class="text-gray-600 line-clamp-2 mb-6"><?= $blog['summary'] ?></p>
                <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="text-primary-600 font-bold flex items-center group-hover:underline">
                    Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>