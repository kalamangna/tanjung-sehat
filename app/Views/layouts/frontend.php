<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Home' ?> | <?= $settings['site_name'] ?? 'Klinik Tanjung Sehat' ?></title>
    <meta name="description" content="<?= $meta_desc ?? $settings['meta_description'] ?? '' ?>">
    <meta name="keywords" content="<?= $meta_keys ?? $settings['meta_keywords'] ?? '' ?>">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "MedicalOrganization",
      "name": "<?= $settings['site_name'] ?? 'Klinik Tanjung Sehat' ?>",
      "url": "<?= base_url() ?>",
      "logo": "<?= base_url('images/logo.png') ?>",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "<?= $settings['contact_phone'] ?? '' ?>",
        "contactType": "customer service"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?= $settings['contact_address'] ?? '' ?>",
        "addressLocality": "Makassar",
        "addressRegion": "Sulawesi Selatan",
        "addressCountry": "ID"
      }
    }
    </script>
</head>
<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    <?= $this->include('components/header') ?>

    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('components/footer') ?>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/<?= $settings['whatsapp_number'] ?? '' ?>" class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition-colors z-50" target="_blank">
        <i class="fab fa-whatsapp text-3xl"></i>
    </a>

    <!-- Scripts -->
    <script src="<?= base_url('js/main.js') ?>"></script>
    <script>
        // Global Image Error Handler
        document.addEventListener('error', function (event) {
            if (event.target.tagName.toLowerCase() !== 'img') return;
            
            const img = event.target;
            const category = img.getAttribute('data-category') || 'general';
            const fallbacks = {
                service: 'https://picsum.photos/seed/service/800/450',
                doctor: 'https://picsum.photos/seed/doctor/600/800',
                blog: 'https://picsum.photos/seed/blog/1000/625',
                gallery: 'https://picsum.photos/seed/gallery/800/800',
                general: 'https://picsum.photos/seed/tanjung/800/600'
            };

            if (!img.getAttribute('data-tried-fallback')) {
                console.error('Image failed to load:', img.src, '| Falling back to:', category);
                img.setAttribute('data-tried-fallback', 'true');
                img.src = fallbacks[category] || fallbacks.general;
            }
        }, true);
    </script>
</body>
</html>
