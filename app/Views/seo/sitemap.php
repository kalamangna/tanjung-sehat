<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach ($pages as $page): ?>
    <url>
        <loc><?= base_url($page) ?></loc>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>

    <?php foreach ($doctors as $doctor): ?>
    <url>
        <loc><?= base_url('doctors/' . $doctor['slug']) ?></loc>
        <lastmod><?= date('Y-m-d', strtotime($doctor['updated_at'] ?? $doctor['created_at'])) ?></lastmod>
        <priority>0.7</priority>
    </url>
    <?php endforeach; ?>

    <?php foreach ($blogs as $blog): ?>
    <url>
        <loc><?= base_url('blog/' . $blog['slug']) ?></loc>
        <lastmod><?= date('Y-m-d', strtotime($blog['updated_at'] ?? $blog['created_at'])) ?></lastmod>
        <priority>0.6</priority>
    </url>
    <?php endforeach; ?>
</urlset>
