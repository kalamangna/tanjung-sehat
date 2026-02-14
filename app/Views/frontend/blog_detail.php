<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<article class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <header class="text-center mb-12">
            <span class="inline-block px-4 py-1 bg-primary-100 text-primary-700 rounded-full font-bold text-sm uppercase tracking-wider mb-6">
                <?= $blog['category_name'] ?>
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-6"><?= $blog['title'] ?></h1>
            <div class="flex items-center justify-center text-gray-500 gap-6">
                <span class="flex items-center gap-2"><i class="far fa-calendar"></i> <?= date('d M Y', strtotime($blog['created_at'])) ?></span>
            </div>
        </header>

        <?php 
            $image_src = $blog['image'];
            if ($image_src && !filter_var($image_src, FILTER_VALIDATE_URL)) {
                $image_src = base_url('uploads/blog/' . $image_src);
            }
        ?>
        <?php if ($image_src): ?>
            <img src="<?= $image_src ?>" alt="<?= $blog['title'] ?>" class="w-full aspect-video object-cover rounded-[2.5rem] mb-12 shadow-2xl">
        <?php endif; ?>

        <div class="prose prose-lg prose-primary max-w-none text-gray-700 leading-relaxed">
            <?= $blog['content'] ?>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-100 flex flex-wrap gap-4 items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="font-bold text-gray-900">Bagikan:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" class="w-10 h-10 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center hover:bg-primary-600 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></a>
                <a href="https://api.whatsapp.com/send?text=<?= $blog['title'] ?>%20<?= current_url() ?>" target="_blank" class="w-10 h-10 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center hover:bg-primary-600 hover:text-white transition-all"><i class="fab fa-whatsapp"></i></a>
            </div>
            <a href="<?= base_url('blog') ?>" class="text-primary-600 font-bold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Blog
            </a>
        </div>
    </div>
</article>

<?= $this->endSection() ?>
